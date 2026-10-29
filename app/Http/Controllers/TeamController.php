<?php

namespace App\Http\Controllers;

use View;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Company;
use App\Models\UserGroup;
use App\Models\FinalGrade;
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
        $currentYear = $currentYear;
        $currentMonth = date('m');

        $search     = $request->input('qsearch', '');
        $ug         = $request->input('qug');
        $comp       = $request->input('qcomp', '');
        $level      = $request->input('qlevel', '');

        if ($currentMonth >= 7 && $currentMonth <= 12) {
            // Jul–Dec: rating period 1 (for Jan–Jun work)
            $period_id = 1;
            $year = $currentYear;
        } else {
            // Jan–Jun: rating period 2 (for Jul–Dec work of previous year)
            $period_id = 2;
            $year = $currentYear - 1;
        }
        // $period_id = 1;
        // $year = $currentYear - 1;

       
        $user = auth()->user();
        $evaluatorId = $user->id;

        // Retrieve subordinates 
        $subordinatesAsIS = User::where('is_id', $user->id)->where('u_active', 1)->UserSearch($search)->SearchCompany($comp)->SearchLevel($level)->SearchUsergroup($ug);
        $subordinatesAsFR = User::where('fr_id', $user->id)->where('u_active', 1)->UserSearch($search)->SearchCompany($comp)->SearchLevel($level)->SearchUsergroup($ug);
        
        $rows = $subordinatesAsIS->union($subordinatesAsFR)->paginate(30);

        $groups     = UserGroup::get();
        $roles      = Role::where('id', '!=', 1)->get();
        $companies  = Company::get();

        
        foreach ($rows as $row) {
            // Check if each subordinate has been rated by the evaluator
            $row->has_been_rated = PerformanceAppraisal::where('employee_id', $row->id)
                                                       ->where('evaluator_id', $evaluatorId)
                                                       ->where('period_id', $period_id)
                                                       ->whereYear('created_at', $year)
                                                       ->where('status', 'submitted')
                                                       ->first();

            

            // Check if the immediate supervisor has rated the employee
            $row->immediate_supervisor_rated = PerformanceAppraisal::where('employee_id', $row->id)
            ->where('evaluator_id', $row->is_id)
            ->wherenot('evaluator_id', $user->id)
            ->where('period_id', $period_id)
            ->whereYear('created_at', $year)
            ->where('status', 'submitted')
            ->first();

            $row->has_da = EmployeeOffense::where('employee_id', $row->id)
                              ->where('date_committed', '>=', now()->subMonths(6))
                              ->first();

            //check if the user has attendance
            $row->has_attendance = ActualAttendance::where('employee_id', $row->id)
            ->where('period_id', $period_id)
            ->whereYear('created_at', $year)
            ->first();

            $row->is_final_rater = User::where('id', $row->id)->where('fr_id', $user->id)->first();


            $row->forevaluation = User::where('id', $row->id)->whereNot('es_id', 3)->where('force_rate', true)->first();


            //check if the user has attendance
            $row->has_attendance1 = FinalGrade::where('employee_id', $row->id)
            ->where('period_id', 3)
            ->where('year', $year)
            ->whereNotNull('attendance_id')
            ->where('final_grade', 0)
            ->latest('updated_at')
            ->first();

            // $row->has_been_rated1 = PerformanceAppraisal::where('employee_id', $row->id)
            //                                            ->where('evaluator_id', $evaluatorId)
            //                                            ->where('period_id', 3)
            //                                            ->whereYear('created_at', $currentYear)
            //                                            ->where('status', 'submitted')
            //                                            ->first();
                                                       
            // // Check if the immediate supervisor has rated the employee
            // $row->immediate_supervisor_rated1 = PerformanceAppraisal::where('employee_id', $row->id)
            // ->where('evaluator_id', $row->is_id)
            // ->wherenot('evaluator_id', $user->id)
            // ->where('period_id', 3)
            // ->whereYear('created_at', $currentYear)
            // ->where('status', 'submitted')
            // ->first();


            $appraisalRated1 = PerformanceAppraisal::where('employee_id', $row->id)
            ->where('evaluator_id', $evaluatorId)
            ->where('period_id', 3)
            ->whereYear('created_at', $currentYear)
            ->where('status', 'submitted')
            ->first();

            $finalUsed1 = $appraisalRated1 ? FinalGrade::where(function ($q) use ($appraisalRated1) {
                    $q->where('appraisal1_id', $appraisalRated1->id)
                      ->orWhere('appraisal2_id', $appraisalRated1->id);
                })
                ->where('period_id', 3)
                ->where('year', $currentYear)
                ->where('final_grade', 1)
                ->exists() : false;
            
            $row->has_been_rated1 = ($appraisalRated1 && !$finalUsed1) ? $appraisalRated1 : null;
            
            // Check for immediate supervisor rating
            $appraisalSupervisor1 = PerformanceAppraisal::where('employee_id', $row->id)
                ->where('evaluator_id', $row->is_id)
                ->whereNot('evaluator_id', $user->id)
                ->where('period_id', 3)
                ->whereYear('created_at', $currentYear)
                ->where('status', 'submitted')
                ->first();
            
            $finalUsedByIS = $appraisalSupervisor1 ? FinalGrade::where(function ($q) use ($appraisalSupervisor1) {
                    $q->where('appraisal1_id', $appraisalSupervisor1->id)
                      ->orWhere('appraisal2_id', $appraisalSupervisor1->id);
                })
                ->where('period_id', 3)
                ->where('year', $currentYear)
                ->where('final_grade', 1)
                ->exists() : false;
            
            $row->immediate_supervisor_rated1 = ($appraisalSupervisor1 && !$finalUsedByIS) ? $appraisalSupervisor1 : null;


            

            $row->is_final_rater1 = User::where('id', $row->id)->where('fr_id', $user->id)->first();
        }

        return view('pages.team.index', compact('rows', 'companies', 'roles', 'groups', 'msg', 'search', 'ug', 'comp', 'level'));
    }

    public function rate(Request $request, $id)
    {
        $msg        = $request->session()->pull('session_msg', '');
        $user       = User::where('id', $id)->firstorFail();

        $currentYear = date('Y');
        $currentMonth = date('m');

        // Determine the period_id based on the current month
        if ($currentMonth >= 7 && $currentMonth <= 12) {
            // Jul–Dec: rating period 1 (for Jan–Jun work)
            $period_id = 1;
            $year = $currentYear;
        } else {
            // Jan–Jun: rating period 2 (for Jul–Dec work of previous year)
            $period_id = 2;
            $year = $currentYear - 1;
        }
        // $period_id = 1;
        // $year = $currentYear - 1;

        $appraise_id = 0;

        if($user->es_id != 3)
        {   
            $final_grade = FinalGrade::where('employee_id', $user->id) 
                                ->where('period_id', 3)
                                ->where('year', $currentYear)
                                ->whereNotNull('attendance_id')
                                ->where('final_grade', 0)
                                ->latest('updated_at')
                                ->first();

            return view('pages.rate.form2', compact('msg', 'user', 'appraise_id', 'period_id', 'currentYear', 'final_grade'));
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
            if ($currentMonth >= 7 && $currentMonth <= 12) {
                // Jul–Dec: rating period 1 (for Jan–Jun work)
                $period_id = 1;
                $year = $currentYear;
            } else {
                // Jan–Jun: rating period 2 (for Jul–Dec work of previous year)
                $period_id = 2;
                $year = $currentYear-1;
            }
            // $period_id = 1;
            // $year = $currentYear-1;
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
                'created_at' => now()->subMonths(8),
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
                'status' => 'submitted'
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
            
            $request->request->add(['appraisal_rating_score' => $ratingscore, 'status' => 'submitted']);

            // Create a new record in the AppraisalRating table
            $appraisal_ratings = AppraisalRating::create($request->all());

            // Dispatch the FinalGradeUpdated event
            event(new FinalGradeUpdated($id, $period_id));

            // Check if the user is the immediate supervisor (is_id)
            $isImmediateSupervisor = $this->checkIfImmediateSupervisor($userid, $id); // Implement this function to return true/false

            if ($isImmediateSupervisor) {
                // Send notification to HR and the final rater
                // $this->sendNotificationToHR($id);
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
                'created_at' => $supervisorAppraisal->created_at,
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
                'status' => 'submitted',
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
            event(new FinalGradeUpdated($supervisorAppraisal->employee_id, $supervisorAppraisal->period_id));

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
                'created_at' => $supervisorAppraisal->created_at,
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
                'status' => 'submitted',
                // Add other fields as necessary
            ]);

            // Copy the supervisor's AppraisalRating
            $newRatingData = $supervisorRating->toArray();
            $newRatingData['appraisal_id'] = $finalRaterAppraisal->id;
            unset($newRatingData['id']); // Remove the ID to create a new record

            AppraisalRating::create($newRatingData);

            // Dispatch the FinalGradeUpdated event
            event(new FinalGradeUpdated($supervisorAppraisal->employee_id, $supervisorAppraisal->period_id));

            return redirect()->route('team.index')->with('session_msg', 'Rating copied successfully.');
        } else {
            return redirect()->route('team.index')->with('session_msg', 'No appraisal rating found to copy.');
        }
    }

    public function view(Request $request, $id)
    {
        $msg        = $request->session()->pull('session_msg', '');
        $auth_id    = Auth::id();
        $employee   = User::find($id);
    
        $rows = PerformanceAppraisal::where('employee_id', $employee->id)
            ->where('evaluator_id', $auth_id)
            ->orderby('created_at', 'desc')
            ->orderby('period_id', 'asc')
            ->where('status', 'submitted')
            ->paginate(20);
    
        foreach ($rows as $row) {
            // Check if the user has attendance
            $row->has_attendance = ActualAttendance::where('employee_id', $employee->id)
                ->where('period_id', $row->period_id)
                ->exists(); // Use `exists()` for efficiency
        
            // Fetch the final grade (if exists) where final_grade = 1
            $row->final_grades = FinalGrade::where(function ($query) use ($row) {
                $query->where('appraisal1_id', $row->id)
                      ->orWhere('appraisal2_id', $row->id);
            })
            ->get();
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
        $evaluator          = Auth::id();
        $appraisal          = PerformanceAppraisal::where('id', $id)->first();
        $user               = User::where('id', $appraisal->employee_id)->first();
        $appraisal          = PerformanceAppraisal::where('id', $id)->first();
        $ratings            = AppraisalRating::where('appraisal_id', $appraisal->id)->first();
        $attendance         = ActualAttendance::where('employee_id', $appraisal->employee_id)->where('period_id', $appraisal->period_id)->whereYear('created_at', $appraisal->created_at)->first();
            
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
        $attendance         = ActualAttendance::where('employee_id', $appraisal->employee_id)->where('period_id', $appraisal->period_id)->whereYear('created_at', $appraisal->created_at)->first();
        
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

    public function autoSave(Request $request) {
        $appraisal = PerformanceAppraisal::updateOrCreate(
            ['id' => $request->appraisal_id], 
            $request->only([
                'employee_id', 'evaluator_id', 'evaluation_date', 'period_id', 
                'evaluator_remarks', 'employee_remarks', 'period', 'name', 'company', 'group', 'designation', 
                'job_rank', 'created_at', 'updated_at', 'deleted_at', 'start_month', 'end_month', 'pa_file', 'pa_filename'
            ])
        );
    
        $rating = AppraisalRating::updateOrCreate(
            ['appraisal_id' => $appraisal->id], 
            $request->only([
                'appraisal_id', 'form_id', 'evaluator_recommendation','jk_rating_1', 'jk_rating_2', 'jk_rating_3', 'jk_rating_4', 'jk_rating_5', 'jk_rating_score', 'jk_rating_remarks', 'quality_rating_1', 'quality_rating_2', 'quality_rating_3', 'quality_rating_4', 'quality_rating_5', 'quality_rating_score', 'quality_rating_remarks', 'quantity_rating_1', 'quantity_rating_2', 'quantity_rating_3', 'quantity_rating_4', 'quantity_rating_5', 'quantity_rating_score', 'quantity_rating_remarks', 'initiative_rating_1', 'initiative_rating_2', 'initiative_rating_3', 'initiative_rating_4', 'initiative_rating_5', 'initiative_rating_score', 'initiative_rating_remarks', 'coop_rating_1', 'coop_rating_2', 'coop_rating_3', 'coop_rating_4', 'coop_rating_5', 'coop_rating_score', 'coop_rating_remarks', 'comms_rating_1', 'comms_rating_2', 'comms_rating_3', 'comms_rating_4', 'comms_rating_5', 'comms_rating_score', 'comms_rating_remarks', 'comp_rating_1', 'comp_rating_2', 'comp_rating_3', 'comp_rating_4', 'comp_rating_5', 'comp_rating_6', 'comp_rating_7', 'comp_rating_score', 'comp_rating_remarks', 'attend_rating_1', 'attend_rating_2', 'attend_rating_3', 'attend_rating_4', 'attend_rating_5', 'attend_rating_score', 'attend_rating_remarks', 'ps_rating_1', 'ps_rating_2', 'ps_rating_3', 'ps_rating_4', 'ps_rating_5', 'ps_rating_score', 'ps_rating_remarks', 'inno_rating_1', 'inno_rating_2', 'inno_rating_3', 'inno_rating_4', 'inno_rating_score', 'inno_rating_remarks', 'tw_rating_1', 'tw_rating_2', 'tw_rating_3', 'tw_rating_4', 'tw_rating_5', 'tw_rating_score', 'tw_rating_remarks', 'pm_rating_1', 'pm_rating_2', 'pm_rating_3', 'pm_rating_4', 'pm_rating_5', 'pm_rating_score', 'pm_rating_remarks', 'judgment_rating_1', 'judgment_rating_2', 'judgment_rating_3', 'judgment_rating_4', 'judgment_rating_5', 'judgment_rating_score', 'judgment_rating_remarks', 'leadership_rating_1', 'leadership_rating_2', 'leadership_rating_3', 'leadership_rating_4', 'leadership_rating_5', 'leadership_rating_score', 'leadership_rating_remarks','management_rating_1', 'management_rating_2', 'management_rating_3', 'management_rating_4', 'management_rating_5', 'management_rating_6', 'management_rating_7', 'management_rating_score', 'management_rating_remarks', 'appraisal_rating_score',
            ])
        );
    
        return response()->json(['success' => true, 'appraisal_id' => $appraisal->id]);
    }
    
}
