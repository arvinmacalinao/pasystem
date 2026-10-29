<?php

namespace App\Http\Controllers;

use View;
use App\Models\Role;
use App\Models\User;
use App\Models\Company;
use App\Models\UserGroup;
use App\Models\FinalGrade;
use Illuminate\Http\Request;
use App\Helpers\AppraisalHelper;
use App\Models\ActualAttendance;
use App\Events\FinalGradeUpdated;
use App\Models\PerformanceAppraisal;
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

        $years       = $this->encodableYears();
        $currentYear = $this->selectedYear($request);

        $groups     = UserGroup::get();
        $roles      = Role::where('id', '!=', 1)->get();
        $companies  = Company::get();

        $search     = $request->input('qsearch', '');
        $ug         = $request->input('qug');
        $comp       = $request->input('qcomp', '');
        $level      = $request->input('qlevel', '');
        $status      = $request->input('qstatus', '');

       
        // Determine the period_id based on the current month

        // Fetch users with filled-up performance appraisals
        $rows = User::whereNot('job_level', 10)->UserSearch($search)->SearchCompany($comp)->SearchLevel($level)->SearchUsergroup($ug)->SearchStatus($status)->orderby('created_at', 'desc')->paginate(100);

        
        // Check if each subordinate has been rated by the evaluator
        foreach ($rows as $row) {

            if($row->es_id == 3){
                $row->has_been_rated = ActualAttendance::where('employee_id', $row->id)
                                                               ->whereIn('period_id', [1, 2])
                                                               ->wherenot('period_id', 3)
                                                               ->whereYear('created_at', $currentYear)
                                                               ->get();
            }
            else{
                $period_id = 3;
                // $row->has_been_rated = ActualAttendance::where('employee_id', $row->id)
                //                                             ->where('period_id', $period_id)->whereHas('employee', function ($query) {
                //                                                 $query->where('force_rate', 1); // Ensure 'employee_id' exists
                //                                             })->exists();
                $row->has_been_rated = FinalGrade::where('employee_id', $row->id)
                    ->where('period_id', 3)
                    ->where('year', $currentYear)
                    ->whereNotNull('attendance_id')
                    ->where('final_grade', 0)
                    ->latest('updated_at')
                    ->first();
            }
        }
        return view('pages.hrsettings.attendance.index', compact('rows','msg', 'groups', 'roles', 'companies', 'search', 'ug', 'comp', 'level', 'status', 'years', 'currentYear'));
    }

    public function index2(Request $request)
    {
        $msg        = $request->session()->pull('session_msg', '');

        $groups     = UserGroup::get();
        $roles      = Role::where('id', '!=', 1)->get();
        $companies  = Company::get();

        $search     = $request->input('qsearch', '');
        $ug         = $request->input('qug');
        $comp       = $request->input('qcomp', '');
        $level      = $request->input('qlevel', '');

        $status      = $request->input('qstatus', '');

        $currentYear = date('Y');
        $currentMonth = date('m');
        // Determine the period_id based on the current month

        // Fetch users with filled-up performance appraisals
        $rows = User::whereNot('job_level', 10)->UserSearch($search)->SearchCompany($comp)->SearchLevel($level)->SearchUsergroup($ug)->SearchStatus($status)->orderby('created_at', 'desc')->paginate();

        
        // Check if each subordinate has been rated by the evaluator
        foreach ($rows as $row) {

            if($row->es_id == 3){
              
                if ($currentMonth >= 7 && $currentMonth <= 12) {
                    $period_id = 1; // Current year for Period 1 (January-June)
                    } else {
                        $period_id = 2; // Previous year for Period 2 (July-December)
                    }
                
                
    
                $row->has_been_rated = ActualAttendance::where('employee_id', $row->id)
                                                            ->where('period_id', $period_id)
                                                            ->exists();
            }
            else{
                $period_id = 3;
                $row->has_been_rated = FinalGrade::where('employee_id', $row->id)
                    ->where('period_id', 3)
                    ->where('year', $currentYear)
                    ->whereNotNull('attendance_id')
                    ->where('final_grade', 0)
                    ->latest('updated_at')
                    ->first();
            }            
        }
        return view('pages.hrsettings.attendance.index', compact('rows','msg', 'groups', 'roles', 'companies', 'search', 'ug', 'comp', 'level'));
    }

    public function rate(Request $request, $id, $period)
    {
        $msg        = $request->session()->pull('session_msg', '');
        $user       = User::where('id', $id)->firstorFail();

        $currentYear = $this->selectedYear($request);

        if($user->es_id == 3)
        {
        
            $period_id = $period; // Current year for Period 1 (January-June)
        }
        else{
            $period_id = 3;
        }

        $attendance_id = 0;

        if($user->es_id != 3){
            return view('pages.hrsettings.attendance.form2', compact('msg', 'user', 'attendance_id', 'period_id', 'currentYear'));
        }
        else{
            return view('pages.hrsettings.attendance.form', compact('msg', 'user', 'attendance_id', 'period_id', 'currentYear'));
        }
        
    }

    public function store(Request $request, $id, $attendance_id)
    {   
        $endMonth = $request->input('end_month');

        $employee_level = User::where('id', $id)->first();
        
        $userid = auth()->id();

        $year = $this->selectedYear($request);

        // Check if a record already exists for the current year and period_id
        $existingRecord = ActualAttendance::where('employee_id', $id)
                                            ->where('period_id', $request->period_id)
                                            ->whereYear('created_at', $year)
                                            ->first();

        if ($existingRecord) {
            return redirect()->back()->withErrors(['error' => 'A record already exists for this employee for the current year and period.']);
        }


        if($attendance_id == 0){

            $currentYear = date('Y');
            $currentMonth = date('m');

            if($employee_level->es_id == 3)
            {   
                $period_id = $request->period_id;
                $start_month = $request->start_month;
                $end_month = $request->end_month;
                $categories = $this->getCategoriesBasedOnJobLevel($employee_level->job_level);
                $averageRatings = AppraisalHelper::computeAttendanceRatings1($request, $categories);
            }
            else{
                $period_id = 3;
                $start_month = $request->input('start_month');
                $numberofmonths = $request->input('end_month');
                $end_month = $start_month - 1 + $numberofmonths;
                $categories = $this->getCategoriesBasedOnJobLevel($employee_level->job_level);
                $averageRatings = AppraisalHelper::computeAttendanceRatings($request, $categories, $endMonth);
            }

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
            $request->request->add([
                'employee_id' => $id,
                'encoder_id' => $userid,
                'period_id' => $period_id,
                'start_month' => $start_month,
                'end_month' => $end_month,
                'created_at' => now()->subMonths(6)->year($year), // created_at's year is the appraisal year
            ]);

            $actual_attendance = ActualAttendance::create($request->all());

            $user_test_id = User::where('id', $id)->first();

            $appraisal1 = PerformanceAppraisal::where('employee_id', $id)
            ->where('period_id', 3)
            ->where('evaluator_id', $user_test_id->is_id)
            ->first();

            $appraisal2 = PerformanceAppraisal::where('employee_id', $id)
            ->where('period_id', 3)
            ->where('evaluator_id', $user_test_id->fr_id)
            ->first();

            if ($appraisal1) {
                 // Convert start_month and end_month numbers to month names
                $start_month_name = \Carbon\Carbon::createFromFormat('m', $start_month)->format('F');
                $end_month_name = \Carbon\Carbon::createFromFormat('m', $end_month)->format('F');

                // Update the values
                $appraisal1->start_month = $start_month;
                $appraisal1->end_month = $end_month;
                $appraisal1->period = "{$start_month_name} - {$end_month_name}";
            
                // Save the updated record
                $appraisal1->save();
            } else {
                // Handle the case where no record is found (optional)
                \Log::warning('No PerformanceAppraisal record found for employee_id: ' . $id);
            }

            if ($appraisal2) {
                // Convert start_month and end_month numbers to month names
               $start_month_name = \Carbon\Carbon::createFromFormat('m', $start_month)->format('F');
               $end_month_name = \Carbon\Carbon::createFromFormat('m', $end_month)->format('F');

               // Update the values
               $appraisal2->start_month = $start_month;
               $appraisal2->end_month = $end_month;
               $appraisal2->period = "{$start_month_name} - {$end_month_name}";
           
               // Save the updated record
               $appraisal2->save();
           } else {
               // Handle the case where no record is found (optional)
               \Log::warning('No PerformanceAppraisal record found for employee_id: ' . $id);
           }

            // Dispatch the FinalGradeUpdated event
            event(new FinalGradeUpdated($id, $period_id, $year));


            $request->session()->put('session_msg', 'Ratings has been successfully submitted.');
        } else {
            // Not yet editable
        }
        return redirect(route('hr.attendance.index', ['qyear' => $year]));
    }

    // Default appraisal year: Jul–Dec encodes the current year, Jan–Jun encodes the previous year
    private function defaultAppraisalYear()
    {
        return date('m') >= 7 ? (int) date('Y') : (int) date('Y') - 1;
    }

    // HR may encode the default year or the year before it (late encoding)
    private function encodableYears()
    {
        $year = $this->defaultAppraisalYear();

        return [$year, $year - 1];
    }

    private function selectedYear(Request $request)
    {
        $year = (int) $request->input('qyear', $this->defaultAppraisalYear());

        return in_array($year, $this->encodableYears()) ? $year : $this->defaultAppraisalYear();
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

    public function view(Request $request, $id)
    {
        $msg        = $request->session()->pull('session_msg', '');
        $auth_id    = Auth::id();
        $employee   = User::find($id);
    
        $rows = ActualAttendance::where('employee_id', $employee->id)
            ->orderby('created_at', 'desc')
            ->orderby('period_id', 'asc')
            ->paginate(20);
    
        return view('pages.hrsettings.attendance.view', compact('msg', 'employee', 'rows'));
    }

    public function store2(Request $request, $id, $attendance_id)
    {   
        // $request->validate([
        //     'late_rating_1' => 'nullable|integer|between:1,5',
        //     'late_rating_2' => 'nullable|integer|between:1,5',
        //     'late_rating_3' => 'nullable|integer|between:1,5',
        //     'late_rating_4' => 'nullable|integer|between:1,5',
        //     'late_rating_5' => 'nullable|integer|between:1,5',
        //     'da_records_late_1' => 'nullable|integer|between:0,5',
        //     'da_records_late_2' => 'nullable|integer|between:0,5',
        //     'da_records_late_3' => 'nullable|integer|between:0,5',
        //     'da_records_late_4' => 'nullable|integer|between:0,5',
        //     'da_records_late_5' => 'nullable|integer|between:0,5',
        //     'da_records_late_6' => 'nullable|integer|between:0,5',
        //     'ut_rating_1' => 'nullable|integer|between:,5',
        //     'ut_rating_2' => 'nullable|integer|between:,5',
        //     'ut_rating_3' => 'nullable|integer|between:,5',
        //     'ut_rating_4' => 'nullable|integer|between:,5',
        //     'ut_rating_5' => 'nullable|integer|between:,5',
        //     'ut_rating_6' => 'nullable|integer|between:,5',
        //     'da_records_ut_1' => 'nullable|integer|between:0,5',
        //     'da_records_ut_2' => 'nullable|integer|between:0,5',
        //     'da_records_ut_3' => 'nullable|integer|between:0,5',
        //     'da_records_ut_4' => 'nullable|integer|between:0,5',
        //     'da_records_ut_5' => 'nullable|integer|between:0,5',
        //     'da_records_ut_6' => 'nullable|integer|between:0,5',
        //     'ul_rating_1' => 'nullable|integer|between:1,5',
        //     'ul_rating_2' => 'nullable|integer|between:1,5',
        //     'ul_rating_3' => 'nullable|integer|between:1,5',
        //     'ul_rating_4' => 'nullable|integer|between:1,5',
        //     'ul_rating_5' => 'nullable|integer|between:1,5',
        //     'ul_rating_6' => 'nullable|integer|between:1,5',
        //     'da_records_ul_1' => 'nullable|integer|between:0,5',
        //     'da_records_ul_2' => 'nullable|integer|between:0,5',
        //     'da_records_ul_3' => 'nullable|integer|between:0,5',
        //     'da_records_ul_4' => 'nullable|integer|between:0,5',
        //     'da_records_ul_5' => 'nullable|integer|between:0,5',
        //     'da_records_ul_6' => 'nullable|integer|between:0,5',
        // ]);

        $endMonth = $request->input('end_month');

        $employee_level = User::where('id', $id)->first();
        
        $userid = auth()->id();
        // Get current year
        $currentYear = date('Y');

        // Check if a record already exists for the current year and period_id
        $existingRecord = ActualAttendance::where('employee_id', $id)
                                            ->where('period_id', $request->period_id)
                                            ->whereYear('created_at', $currentYear - 1)
                                            ->first();

        if ($existingRecord) {
            return redirect()->back()->withErrors(['error' => 'A record already exists for this employee for the current year and period.']);
        }


        if($attendance_id == 0){

            $currentYear = date('Y');
            $currentMonth = date('m');

            

            if($employee_level->es_id == 3)
            {
                // Determine the period_id based on the current month

                if ($currentMonth >= 7 && $currentMonth <= 12) {
                    $period_id = 1; // Current year for Period 1 (January-June)
                    $start_month = 1;
                    $end_month = 6;
                    $categories = $this->getCategoriesBasedOnJobLevel($employee_level->job_level);
                    $averageRatings = AppraisalHelper::computeAttendanceRatings1($request, $categories);
                } else {
                    $period_id = 2; // Previous year for Period 2 (July-December)
                    $start_month = 7;
                    $end_month = 12;
                    $categories = $this->getCategoriesBasedOnJobLevel($employee_level->job_level);
                    $averageRatings = AppraisalHelper::computeAttendanceRatings1($request, $categories);
                }
            }
            else{
                $period_id = 3;
                $start_month = $request->input('start_month');
                $numberofmonths = $request->input('end_month');
                $end_month = $start_month - 1 + $numberofmonths;
                $categories = $this->getCategoriesBasedOnJobLevel($employee_level->job_level);
                $averageRatings = AppraisalHelper::computeAttendanceRatings($request, $categories, $endMonth);
            }

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
            $request->request->add([
                'employee_id' => $id,
                'encoder_id' => $userid,
                'period_id' => $period_id,
                'start_month' => $start_month,
                'end_month' => $end_month,
                'created_at' => now()->subMonths(8), // Add created_at two months earlier
            ]); 

            $actual_attendance = ActualAttendance::create($request->all());

            $user_test_id = User::where('id', $id)->first();

            $appraisal1 = PerformanceAppraisal::where('employee_id', $id)
            ->where('period_id', 3)
            ->where('evaluator_id', $user_test_id->is_id)
            ->first();

            $appraisal2 = PerformanceAppraisal::where('employee_id', $id)
            ->where('period_id', 3)
            ->where('evaluator_id', $user_test_id->fr_id)
            ->first();

            if ($appraisal1) {
                 // Convert start_month and end_month numbers to month names
                $start_month_name = \Carbon\Carbon::createFromFormat('m', $start_month)->format('F');
                $end_month_name = \Carbon\Carbon::createFromFormat('m', $end_month)->format('F');

                // Update the values
                $appraisal1->start_month = $start_month;
                $appraisal1->end_month = $end_month;
                $appraisal1->period = "{$start_month_name} - {$end_month_name}";
            
                // Save the updated record
                $appraisal1->save();
            } else {
                // Handle the case where no record is found (optional)
                \Log::warning('No PerformanceAppraisal record found for employee_id: ' . $id);
            }

            if ($appraisal2) {
                // Convert start_month and end_month numbers to month names
               $start_month_name = \Carbon\Carbon::createFromFormat('m', $start_month)->format('F');
               $end_month_name = \Carbon\Carbon::createFromFormat('m', $end_month)->format('F');

               // Update the values
               $appraisal2->start_month = $start_month;
               $appraisal2->end_month = $end_month;
               $appraisal2->period = "{$start_month_name} - {$end_month_name}";
           
               // Save the updated record
               $appraisal2->save();
           } else {
               // Handle the case where no record is found (optional)
               \Log::warning('No PerformanceAppraisal record found for employee_id: ' . $id);
           }

            // Dispatch the FinalGradeUpdated event
            event(new FinalGradeUpdated($id));

            
            $request->session()->put('session_msg', 'Ratings has been successfully submitted.');
        } else {
            // Not yet editable
        }
        return redirect(route('hr.attendance.index'));
    }
}
