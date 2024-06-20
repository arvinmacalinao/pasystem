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

        // Fetch users with filled-up performance appraisals
        $rows = User::whereHas('performanceAppraisals', function ($query) {
            $query->whereNotNull('employee_id'); // Ensure 'employee_id' exists
        })->paginate();

        $groups     = UserGroup::get();
        $roles      = Role::where('id', '!=', 1)->get();
        $companies  = Company::get();

        // Check if each subordinate has been rated by the evaluator
        foreach ($rows as $row) {
            $row->has_been_rated = ActualAttendance::where('employee_id', $row->id)
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

        if($attendance_id == 0){

            $categories = $this->getCategoriesBasedOnJobLevel($employee_level->job_level);
            $averageRatings = AppraisalHelper::computeAttendanceRatings($request, $categories);

             // Merge the average ratings into the request data
            $request->merge($averageRatings);

            $attend_b_rating_score = array_sum($averageRatings) / count($averageRatings);

            $request->merge(['attend_b_rating_score' => $attend_b_rating_score]);

            // Create a new record in the ActualAttendance table
            $request->request->add(['employee_id' => $id, 'encoder_id' => $userid, 'period_id' => 1]);
            $actual_attendance = ActualAttendance::create($request->all());

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
