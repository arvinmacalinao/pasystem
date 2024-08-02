<?php

namespace App\Http\Controllers;

use View;
use App\Models\Role;
use App\Models\User;
use App\Models\Company;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use App\Helpers\AppraisalHelper;
use App\Models\ActualAttendance;
use App\Events\FinalGradeUpdated;
use Illuminate\Support\Facades\Auth;

class HRAdminController extends Controller
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
        $period_id = ($currentMonth >= 2 && $currentMonth <= 7) ? 1 : 2;

        // Fetch users with filled-up performance appraisals
        $rows = User::whereNot('job_level', 10)->whereHas('performanceAppraisals', function ($query) {
            $query->whereNotNull('employee_id'); // Ensure 'employee_id' exists
        })->orderby('created_at', 'desc')->paginate();

        $groups     = UserGroup::get();
        $roles      = Role::where('id', '!=', 1)->get();
        $companies  = Company::get();
        
        // Check if each subordinate has been rated by the evaluator
        foreach ($rows as $row) {
            $row->has_been_rated = ActualAttendance::where('employee_id', $row->id)
                                                        ->where('period_id', $period_id)
                                                        ->whereYear('created_at', $currentYear)
                                                        ->exists();
        }

        return view('pages.hrsettings.attendance.index', compact('rows','msg', 'groups', 'roles', 'companies'));
    }

    public function rate(Request $request, $id)
    {
        $msg        = $request->session()->pull('session_msg', '');
        $user       = User::where('id', $id)->firstorFail();

        $attendance_id = 0;

        return view('pages.hrsettings.attendance.form', compact('msg', 'user', 'attendance_id'));
    }

    public function store(Request $request, $id, $attendance_id)
    {   
        $employee_level = User::where('id', $id)->first();
        
        $userid = auth()->id();
        // Get current year
        $currentYear = date('Y');

        // Check if a record already exists for the current year and period_id
        $existingRecord = ActualAttendance::where('employee_id', $id)
                                            ->where('period_id', $request->period_id)
                                            ->whereYear('created_at', $currentYear)
                                            ->first();

        if ($existingRecord) {
            return redirect()->back()->withErrors(['error' => 'A record already exists for this employee for the current year and period.']);
        }


        if($attendance_id == 0){

            $categories = $this->getCategoriesBasedOnJobLevel($employee_level->job_level);
            $averageRatings = AppraisalHelper::computeAttendanceRatings($request, $categories);

             // Merge the average ratings into the request data
            $request->merge($averageRatings);

            // Compute Total
            $level = $employee_level->job_level;

            $attend_b_rating_score = array_sum($averageRatings) / count($averageRatings);

            if ($level >= 1 && $level <= 3) {
                $ratingscore = $attend_b_rating_score * .15;
            } elseif ($level >= 4 && $level <= 6) {
                $ratingscore = $attend_b_rating_score * .1;
            } elseif ($level >= 7 && $level <= 8) {
                $ratingscore = $attend_b_rating_score * .08;
            } elseif ($level == 9) {
                $ratingscore = $attend_b_rating_score * .03;
            }

            $request->merge(['attend_b_rating_score' => $ratingscore]);

            // dd($attend_b_rating_score, $level, $averageRatings, $ratingscore);
            
            // Create a new record in the ActualAttendance table
            $request->request->add(['employee_id' => $id, 'encoder_id' => $userid, 'period_id' => 1]);
            $actual_attendance = ActualAttendance::create($request->all());

            // Dispatch the FinalGradeUpdated event
            event(new FinalGradeUpdated($id));

            $request->session()->put('session_msg', 'Ratings has been successfully submitted.');
        } else {
            // Not yet editable
        }
        return redirect(route('hr.attendance.index'));
    }

    private function getCategoriesBasedOnJobLevel($job_level)
    {
        if ($job_level != 10) {
            return ['late', 'ut', 'ul'];
        } else {
            return ['ul'];
        }

        return [];
    }

    public function view(Request $request, $id, $attendance_id)
    {
        $msg        = $request->session()->pull('session_msg', '');
        
        
        return view('pages.hrsettings.attendance.view', compact('msg', 'user', 'attendance_id'));
    }
}
