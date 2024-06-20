<?php

namespace App\Http\Controllers;

use View;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Company;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use App\Models\AppraisalRating;
use App\Helpers\AppraisalHelper;
use App\Models\PerformanceAppraisal;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function __construct() 
    {
		$data = [ 'page' => 'My Team' ];
		View::share('data', $data);

        $this->middleware(function ($request, $next) {  
            if(!Auth::user()) {
                abort(404);
            }

            // app('App\Http\Controllers\RecordLogController')->recordLog();
            
            return $next($request);
        });
	}

    public function index(Request $request)
    {
        $msg        = $request->session()->pull('session_msg', '');

        // Assuming the authenticated user is the supervisor
        $user = auth()->user();
        $evaluatorId = $user->id;

        // Retrieve subordinates for both immediate supervisor and final rater
        $subordinatesAsIS = User::where('is_id', $user->id);
        $subordinatesAsFR = User::where('fr_id', $user->id);
        
        // Combine the queries using union
        $rows = $subordinatesAsIS->union($subordinatesAsFR)->paginate(10);

        $groups     = UserGroup::get();
        $roles      = Role::where('id', '!=', 1)->get();
        $companies  = Company::get();

        
        foreach ($rows as $row) {
            // Check if each subordinate has been rated by the evaluator
            $row->has_been_rated = PerformanceAppraisal::where('employee_id', $row->id)
                                                       ->where('evaluator_id', $evaluatorId)
                                                       ->first();

            // Check if the immediate supervisor has rated the employee
            $row->immediate_supervisor_rated = PerformanceAppraisal::where('employee_id', $row->id)
            ->where('evaluator_id', $row->is_id)
            ->wherenot('evaluator_id', $user->id)
            ->first();
        }

        return view('pages.team.index', compact('rows', 'companies', 'roles', 'groups', 'msg'));
    }

    public function rate(Request $request, $id)
    {
        $msg        = $request->session()->pull('session_msg', '');
        $user       = User::where('id', $id)->firstorFail();

        $appraise_id = 0;

        return view('pages.rate.form', compact('msg', 'user', 'appraise_id'));
    }

    public function appraise(Request $request, $id, $appraise_id)
    {   
        $employee_level = User::where('id', $id)->first();
        
        $userid = auth()->id();

        if($appraise_id == 0){
            // Create a new record in the PerformanceAppraisal table
            $appraisal = PerformanceAppraisal::create([
                'employee_id' => $id,
                'evaluator_id' => $userid,
                'evaluation_date' => now(),
                'period_id' => 1,
                'evaluator_remarks' => $request->input('evaluator_remarks'),
                'employee_remarks' => $request->input('employee_remarks'),
            ]);
    
             // Compute the average ratings
            $categories = $this->getCategoriesBasedOnJobLevel($employee_level->job_level);
            $averageRatings = AppraisalHelper::computeAverageRatings($request, $categories);

            // Add the performance_appraisal_id to the request data
            $request->request->add(['appraisal_id' => $appraisal->id]);

            // Merge the average ratings into the request data
            $request->merge($averageRatings);

            // Create a new record in the AppraisalRating table
            $appraisal_ratings = AppraisalRating::create($request->all());

            $request->session()->put('session_msg', 'Ratings has been successfully submitted.');
        } else {
            // Not yet editable
        }
        return redirect(route('team.index'));
    }

    private function getCategoriesBasedOnJobLevel($job_level)
    {
        if ($job_level >= 1 && $job_level <= 3) {
            return ['jk', 'quality', 'quantity', 'initiative', 'coop', 'comms', 'comp', 'attend'];
        } elseif ($job_level >= 4 && $job_level <= 6) {
            return ['jk', 'quality', 'quantity', 'ps', 'inno', 'tw', 'comms', 'comp', 'attend'];
        } elseif ($job_level >= 7 && $job_level <= 8) {
            return ['jk', 'quality', 'quantity', 'pm', 'ps', 'judgment', 'inno', 'leadership', 'comms', 'comp', 'attend'];
        } elseif ($job_level == 9) {
            return ['jk', 'quality', 'quantity', 'pm', 'ps', 'judgment', 'leadership', 'inno', 'comms', 'comp', 'attend'];
        } elseif ($job_level == 10) {
            return ['management', 'pm', 'ps', 'judgment', 'leadership', 'inno', 'comp'];
        }

        return [];
    }

    public function copyRating($appraisalId)
    {
        $user = auth()->user();

        // Get the immediate supervisor's PerformanceAppraisal
        $supervisorAppraisal = PerformanceAppraisal::findOrFail($appraisalId);

        // Get the associated AppraisalRating
        $supervisorRating = AppraisalRating::where('appraisal_id', $supervisorAppraisal->id)->first();

        if ($supervisorRating) {
            // Create a new PerformanceAppraisal for the final rater
            $finalRaterAppraisal = PerformanceAppraisal::create([
                'employee_id' => $supervisorAppraisal->employee_id,
                'evaluator_id' => $user->id, // final rater
                'evaluation_date' => Carbon::now('Asia/Manila'),
                'period_id' => $supervisorAppraisal->period_id,
                'evaluator_remarks' => $supervisorAppraisal->evaluator_remarks,
                'employee_remarks' => $supervisorAppraisal->employee_remarks,
                // Add other fields as necessary
            ]);

            // Copy the supervisor's AppraisalRating
            $newRatingData = $supervisorRating->toArray();
            $newRatingData['appraisal_id'] = $finalRaterAppraisal->id;
            unset($newRatingData['id']); // Remove the ID to create a new record

            AppraisalRating::create($newRatingData);

            return redirect()->route('team.index')->with('session_msg', 'Rating copied successfully.');
        } else {
            return redirect()->route('team.index')->with('session_msg', 'No appraisal rating found to copy.');
        }
    }

    public function view(Request $request, $appraisalId)
    {
        $msg        = $request->session()->pull('session_msg', '');
        // Retrieve the Performance Appraisal and its associated ratings
        $performanceAppraisal = PerformanceAppraisal::with('appraisalRating')->findOrFail($appraisalId);

        return view('pages.team.view', compact('performanceAppraisal', 'msg'));
    }
}
