<?php

namespace App\Http\Controllers;

use View;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Company;
use App\Models\UserGroup;
use Illuminate\Support\Str;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\AppraisalRating;
use App\Models\EmployeeOffense;
use App\Models\UtilityFunction;
use App\Helpers\AppraisalHelper;
use App\Models\ActualAttendance;
use App\Events\FinalGradeUpdated;
use App\Models\PerformanceAppraisal;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

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

        $currentYear = date('Y');
        $currentMonth = date('m');

        // Determine the period_id based on the current month
        if ($currentMonth >= 7 && $currentMonth <= 12) {
        $period_id = 1; // Current year for Period 1 (January-June)
        } else {
            $period_id = 2; // Previous year for Period 2 (July-December)
        }

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
                                                       ->where('period_id', $period_id)
                                                       ->whereYear('created_at', $currentYear)
                                                       ->first();

            // Check if the immediate supervisor has rated the employee
            $row->immediate_supervisor_rated = PerformanceAppraisal::where('employee_id', $row->id)
            ->where('evaluator_id', $row->is_id)
            ->wherenot('evaluator_id', $user->id)
            ->where('period_id', $period_id)
            ->whereYear('created_at', $currentYear)
            ->first();

            $row->has_da = EmployeeOffense::where('employee_id', $row->id)
                              ->where('date_committed', '>=', now()->subMonths(6))
                              ->first();

            //check if the user has attendance
            $row->has_attendance = ActualAttendance::where('employee_id', $row->id)
            ->where('period_id', $period_id)
            ->whereYear('created_at', $currentYear)
            ->first();

            $row->is_final_rater = User::where('id', $row->id)->where('fr_id', $user->id)->first();


            $row->forevaluation = User::where('id', $row->id)->whereNot('es_id', 3)->where('force_rate', true)->first();

            $row->has_been_rated1 = PerformanceAppraisal::where('employee_id', $row->id)
                                                       ->where('evaluator_id', $evaluatorId)
                                                       ->where('period_id', 3)
                                                       ->whereYear('created_at', $currentYear)
                                                       ->first();
                                                       
            // Check if the immediate supervisor has rated the employee
            $row->immediate_supervisor_rated1 = PerformanceAppraisal::where('employee_id', $row->id)
            ->where('evaluator_id', $row->is_id)
            ->wherenot('evaluator_id', $user->id)
            ->where('period_id', 3)
            ->whereYear('created_at', $currentYear)
            ->first();

            //check if the user has attendance
            $row->has_attendance1 = ActualAttendance::where('employee_id', $row->id)
            ->where('period_id', 3)
            ->whereYear('created_at', $currentYear)
            ->first();

            $row->is_final_rater1 = User::where('id', $row->id)->where('fr_id', $user->id)->first();
        }

        return view('pages.team.index', compact('rows', 'companies', 'roles', 'groups', 'msg'));
    }

    public function rate(Request $request, $id)
    {
        $msg        = $request->session()->pull('session_msg', '');
        $user       = User::where('id', $id)->firstorFail();

        $currentYear = date('Y');
        $currentMonth = date('m');

        // Determine the period_id based on the current month
        if ($currentMonth >= 7 && $currentMonth <= 12) {
            $period_id = 1; // Current year for Period 1 (January-June)
        } else {
            $period_id = 2; // Previous year for Period 2 (July-December)
            $currentYear -= 1;
        }

        $appraise_id = 0;

        if($user->es_id != 3)
        {
            return view('pages.rate.form2', compact('msg', 'user', 'appraise_id', 'period_id', 'currentYear'));
        }
        else
        {
            return view('pages.rate.form', compact('msg', 'user', 'appraise_id', 'period_id', 'currentYear'));
        }

    }

    public function appraise(Request $request, $id, $appraise_id)
    {   
        $employee_level = User::where('id', $id)->first();
        
        $userid = auth()->id();

        $currentYear = date('Y');
        $currentMonth = date('m');

        if($employee_level->es_id == 3)
        {
            // Determine the period_id based on the current month
            if ($currentMonth >= 7 && $currentMonth <= 12) {
                $period_id = 1; // Current year for Period 1 (January-June)
            } else {
                $period_id = 2; // Previous year for Period 2 (July-December)
            }
        }
        else{
            $period_id = 3;
        }
        

        if($appraise_id == 0){

            // Create a new record in the PerformanceAppraisal table

            if($request->hasFile('pa_file')) {
                $file                   = $request->file('pa_file');
                $extension              = $file->getClientOriginalExtension();
                $name                   = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $new_filename           = UtilityFunction::sanitize_filename($name).'_'.Str::random(32).'.'.$extension;
                $file->storeAs('public/pa_support', $new_filename);
                $pa_filename            = $file->getClientOriginalName();
                $pa_file                = $new_filename;
            }
            else{
                $pa_filename            = null;
                $pa_file                = null;
            }
            
            $appraisal = PerformanceAppraisal::create([
                'employee_id' => $id,
                'evaluator_id' => $userid,
                'evaluation_date' => now(),
                'period_id' => $period_id,
                'evaluator_remarks' => $request->input('evaluator_remarks'),
                'employee_remarks' => $request->input('employee_remarks'),
                'period' => $request->input('period'),
                'start_month' => $request->input('start_month'),
                'end_month' => $request->input('end_month'),
                'name' => $request->input('name'),
                'company' => $request->input('company'),
                'group' => $request->input('group'),
                'designation' => $request->input('designation'),
                'job_rank' => $request->input('job_rank'),
                'pa_filename' => $pa_filename,
                'pa_file' => $pa_file,
            ]);
    
             // Compute the average ratings
            $categories = $this->getCategoriesBasedOnJobLevel($employee_level->job_level);
            $averageRatings = AppraisalHelper::computeAverageRatings($request, $categories);

            // Add the performance_appraisal_id to the request data

            $request->request->add(['appraisal_id' => $appraisal->id]);
            
            // Merge the average ratings into the request data
            $request->merge($averageRatings);
           
            // Compute Total
            $level = $employee_level->job_level;
                
            if ($level >= 1 && $level <= 3) {
                $appraisal_rating_score  = [
                    $averageRatings['jk_rating_score']          * 0.2,
                    $averageRatings['quality_rating_score']     * 0.2,
                    $averageRatings['quantity_rating_score']    * 0.15,
                    $averageRatings['initiative_rating_score']  * 0.05,
                    $averageRatings['coop_rating_score']        * 0.05,
                    $averageRatings['comms_rating_score']       * 0.05,
                    $averageRatings['comp_rating_score']        * 0.1,
                    $averageRatings['attend_rating_score']      * 0.05,
                ];
                $ratingscore = array_sum($appraisal_rating_score);
            } elseif ($level >= 4 && $level <= 5) {
                $appraisal_rating_score  = [
                    $averageRatings['jk_rating_score'] * 0.15,
                    $averageRatings['quality_rating_score'] * 0.15,
                    $averageRatings['quantity_rating_score'] * 0.15,
                    $averageRatings['ps_rating_score'] * 0.15,
                    $averageRatings['inno_rating_score'] * 0.05,
                    $averageRatings['tw_rating_score'] * 0.05,
                    $averageRatings['comms_rating_score'] * 0.05,
                    $averageRatings['comp_rating_score'] * 0.1,
                    $averageRatings['attend_rating_score'] * 0.05,
                ];
                $ratingscore = array_sum($appraisal_rating_score);
            } elseif ($level >= 6 && $level <= 7) {
                $appraisal_rating_score  = [
                    $averageRatings['jk_rating_score'] * 0.1,
                    $averageRatings['quality_rating_score'] * 0.1,
                    $averageRatings['quantity_rating_score'] * 0.1,
                    $averageRatings['pm_rating_score'] * 0.1,
                    $averageRatings['ps_rating_score'] * 0.1,
                    $averageRatings['judgment_rating_score'] * 0.05,
                    $averageRatings['leadership_rating_score'] * 0.1,
                    $averageRatings['inno_rating_score'] * 0.08,
                    $averageRatings['comms_rating_score'] * 0.05,
                    $averageRatings['comp_rating_score'] * 0.1,
                    $averageRatings['attend_rating_score'] * 0.04,
                ];
                $ratingscore = array_sum($appraisal_rating_score);
            } elseif ($level >= 8 && $level <= 9) {
                $appraisal_rating_score  = [
                    $averageRatings['jk_rating_score'] * 0.1,
                    $averageRatings['quality_rating_score'] * 0.1,
                    $averageRatings['quantity_rating_score'] * 0.1,
                    $averageRatings['pm_rating_score'] * 0.1,
                    $averageRatings['ps_rating_score'] * 0.1,
                    $averageRatings['judgment_rating_score'] * 0.1,
                    $averageRatings['leadership_rating_score'] * 0.1,
                    $averageRatings['inno_rating_score'] * 0.1,
                    $averageRatings['comms_rating_score'] * 0.05,
                    $averageRatings['comp_rating_score'] * 0.1,
                    $averageRatings['attend_rating_score'] * 0.02,
                ];
                $ratingscore = array_sum($appraisal_rating_score);
            } elseif ($level >= 10 && $level <= 11) {
                $appraisal_rating_score  = [
                    $averageRatings['management_rating_score'] * 0.4,
                    $averageRatings['pm_rating_score'] * 0.1,
                    $averageRatings['ps_rating_score'] * 0.1,
                    $averageRatings['judgment_rating_score'] * 0.1,
                    $averageRatings['leadership_rating_score'] * 0.1,
                    $averageRatings['inno_rating_score'] * 0.1,
                    $averageRatings['comp_rating_score'] * 0.1,
                ];
                $ratingscore = array_sum($appraisal_rating_score);
            }

            // $ratingscore = count($averageRatings) > 0 ? array_sum($averageRatings) / count($averageRatings): null;
            
            // dd($averageRatings, $ratingscore, $level);
            
            $request->request->add(['appraisal_rating_score' => $ratingscore]);

            // Create a new record in the AppraisalRating table
            $appraisal_ratings = AppraisalRating::create($request->all());

            // Dispatch the FinalGradeUpdated event
            event(new FinalGradeUpdated($id));

            // Check if the user is the immediate supervisor (is_id)
            $isImmediateSupervisor = $this->checkIfImmediateSupervisor($userid, $id); // Implement this function to return true/false

            if ($isImmediateSupervisor) {
                // Send notification to HR and the final rater
                $this->sendNotificationToHR($id);
                $this->sendNotificationToFinalRater($id);
            }

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
        } elseif ($job_level >= 4 && $job_level <= 5) {
            return ['jk', 'quality', 'quantity', 'ps', 'inno', 'tw', 'comms', 'comp', 'attend'];
        } elseif ($job_level >= 6 && $job_level <= 7) {
            return ['jk', 'quality', 'quantity', 'pm', 'ps', 'judgment', 'inno', 'leadership', 'comms', 'comp', 'attend'];
        } elseif ($job_level >= 8 && $job_level <= 9) {
            return ['jk', 'quality', 'quantity', 'pm', 'ps', 'judgment', 'leadership', 'inno', 'comms', 'comp', 'attend'];
        } elseif ($job_level >= 10 && $job_level <= 11) {
            return ['management', 'pm', 'ps', 'judgment', 'leadership', 'inno', 'comp'];
        }

        return [];
    }

    public function copyRating(Request $request, $appraisalId)
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
                'start_month' => $supervisorAppraisal->start_month,
                'end_month' => $supervisorAppraisal->end_month,
                'period' => $supervisorAppraisal->period,
                'name' => $supervisorAppraisal->name,
                'company' => $supervisorAppraisal->company,
                'group' => $supervisorAppraisal->group,
                'designation' => $supervisorAppraisal->designation,
                'job_rank' => $supervisorAppraisal->job_rank,
                'pa_file' => $supervisorAppraisal->pa_file,
                'pa_filename' => $supervisorAppraisal->pa_filename,
                // Add other fields as necessary
            ]);

            // Copy the supervisor's AppraisalRating
            $newRatingData = $supervisorRating->toArray();
            $newRatingData['appraisal_id'] = $finalRaterAppraisal->id;
            unset($newRatingData['id'], $newRatingData['evaluator_recommendation']); // Remove the ID to create a new record

             // Add the new evaluator_recommendation from the modal form
            $newRatingData['evaluator_recommendation'] = $request->input('evaluator_recommendation');

            AppraisalRating::create($newRatingData);

            // Dispatch the FinalGradeUpdated event
            event(new FinalGradeUpdated($supervisorAppraisal->employee_id));

            return redirect()->route('team.index')->with('session_msg', 'Rating copied successfully.');
        } else {
            return redirect()->route('team.index')->with('session_msg', 'No appraisal rating found to copy.');
        }
    }

    public function copyRating1($appraisalId)
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
                'start_month' => $supervisorAppraisal->start_month,
                'end_month' => $supervisorAppraisal->end_month,
                'period' => $supervisorAppraisal->period,
                'name' => $supervisorAppraisal->name,
                'company' => $supervisorAppraisal->company,
                'group' => $supervisorAppraisal->group,
                'designation' => $supervisorAppraisal->designation,
                'job_rank' => $supervisorAppraisal->job_rank,
                // Add other fields as necessary
            ]);

            // Copy the supervisor's AppraisalRating
            $newRatingData = $supervisorRating->toArray();
            $newRatingData['appraisal_id'] = $finalRaterAppraisal->id;
            unset($newRatingData['id']); // Remove the ID to create a new record

            AppraisalRating::create($newRatingData);

            // Dispatch the FinalGradeUpdated event
            event(new FinalGradeUpdated($supervisorAppraisal->employee_id));

            return redirect()->route('team.index')->with('session_msg', 'Rating copied successfully.');
        } else {
            return redirect()->route('team.index')->with('session_msg', 'No appraisal rating found to copy.');
        }
    }

    public function view(Request $request, $id)
    {
        $msg        = $request->session()->pull('session_msg', '');
        
        $auth_id    = Auth::id();
        
        $employee       = User::where('id', $id)->first();

        $rows           = PerformanceAppraisal::where('employee_id', $employee->id)->where('evaluator_id', $auth_id)->orderby('created_at', 'desc')->orderby('period_id', 'asc')->paginate(20);

        foreach ($rows as $row) {
            //check if the user has attendance
            $row->has_attendance = ActualAttendance::where('employee_id', $employee->id)
            ->where('period_id', $row->period_id)
            ->first();
        }

        return view('pages.team.view', compact('msg', 'rows', 'id', 'employee'));
    }

    private function checkIfImmediateSupervisor($userid, $employeeId) {
        // Find the employee by ID
            $employee = User::find($employeeId);

            // Check if the employee's immediate supervisor ID matches the user ID
            if ($employee && $employee->is_id == $userid) {
                return true;
            }
        
            return false;
    }
    
    // Function to send notification to HR
    private function sendNotificationToHR($employeeId) {
        $userIds = User::where('r_id', 4)->pluck('id');
        $employee = User::where('id', $employeeId)->first();

        foreach ($userIds as $userId) {
        Notification::create([
            'u_id' => $userId,
            'title' => 'For Attendace Encode',
            'employee_id' => $employeeId,
            'message' => 'You can now encode attendance for this user: ' . $employee->FullName,
        ]);
        }
    }
    
    // Function to send notification to the final rater
    private function sendNotificationToFinalRater($employeeId) {
        $finalrater = User::where('id', $employeeId)->value('fr_id');
        $employee = User::where('id', $employeeId)->first();

        Notification::create([
            'u_id' => $finalrater,
            'title' => 'New Employee Rate',
            'employee_id' => $employeeId,
            'message' => 'You can now rate this user: ' . $employee->FullName,
        ]);
    }

    public function download(Request $request, $id)
    {
        $msg                = $request->session()->pull('session_msg', '');
        // $evaluator          = Auth::id();
        // $appraisal          = PerformanceAppraisal::where('id', $id)->where('evaluator_id', $evaluator)->first();
        $user               = User::where('id', $appraisal->employee_id)->first();
        $appraisal          = PerformanceAppraisal::where('id', $id)->first();
        $ratings            = AppraisalRating::where('appraisal_id', $appraisal->id)->first();
        $attendance         = ActualAttendance::where('employee_id', $appraisal->employee_id)->where('period_id', $appraisal->period_id)->whereYear('created_at', $appraisal->evaluation_date)->first();
            
        if($appraisal->appraisalRating->form_id == 1){
            return view('pdf.form1', compact('msg', 'appraisal', 'ratings', 'attendance', 'user'));
        }
        elseif($appraisal->appraisalRating->form_id == 2){
            return view('pdf.form2', compact('msg', 'appraisal', 'ratings', 'attendance', 'user'));
        }
        elseif($appraisal->appraisalRating->form_id == 3){
            return view('pdf.form3', compact('msg', 'appraisal', 'ratings', 'attendance', 'user'));
        }
        elseif($appraisal->appraisalRating->form_id == 4){
            return view('pdf.form4', compact('msg', 'appraisal', 'ratings', 'attendance', 'user'));
        }
        elseif($appraisal->appraisalRating->form_id == 5){
            return view('pdf.form5', compact('msg', 'appraisal', 'ratings', 'attendance', 'user'));
        }
    }

    public function hrdownload(Request $request, $id)
    {
        $msg                = $request->session()->pull('session_msg', '');
        $appraisal          = PerformanceAppraisal::where('id', $id)->first();
        $user               = User::where('id', $appraisal->employee_id)->first();
        $ratings            = AppraisalRating::where('appraisal_id', $appraisal->id)->first();
        $attendance         = ActualAttendance::where('employee_id', $appraisal->employee_id)->where('period_id', $appraisal->period_id)->whereYear('created_at', $appraisal->evaluation_date)->first();
        
        if($appraisal->appraisalRating->form_id == 1){
            return view('pdf.form1', compact('msg', 'appraisal', 'ratings', 'attendance', 'user'));
        }
        elseif($appraisal->appraisalRating->form_id == 2){
            return view('pdf.form2', compact('msg', 'appraisal', 'ratings', 'attendance', 'user'));
        }
        elseif($appraisal->appraisalRating->form_id == 3){
            return view('pdf.form3', compact('msg', 'appraisal', 'ratings', 'attendance', 'user'));
        }
        elseif($appraisal->appraisalRating->form_id == 4){
            return view('pdf.form4', compact('msg', 'appraisal', 'ratings', 'attendance', 'user'));
        }
        elseif($appraisal->appraisalRating->form_id == 5){
            return view('pdf.form5', compact('msg', 'appraisal', 'ratings', 'attendance', 'user'));
        }
    }

    public function da(Request $request, $id)
    {
        $msg        = $request->session()->pull('session_msg', '');

        $employee       = User::where('id', $id)->first();

        $rows       = EmployeeOffense::where('employee_id', $id)->paginate(20);

        return view('pages.team.view_da', compact('rows', 'msg', 'employee'));
       
    }
}
