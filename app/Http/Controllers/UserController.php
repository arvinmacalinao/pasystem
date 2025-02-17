<?php

namespace App\Http\Controllers;

use View;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Company;
use App\Models\UserGroup;
use App\Models\FinalGrade;
use App\Models\Designation;
use Illuminate\Http\Request;
use App\Models\EmployeeStatus;
use App\Events\FinalGradeUpdated;
use App\Exports\FinalGradeExport;
use App\Models\PerformanceAppraisal;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\UserValidation;

class UserController extends Controller
{
    public function __construct() 
    {
		$data = [ 'page' => 'Users' ];
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
        $search     = $request->input('qsearch', '');

        $ug         = $request->input('qug');
        $comp       = $request->input('qcomp', '');
        $level      = $request->input('qlevel', '');

        $groups     = UserGroup::get();
        $roles      = Role::where('id', '!=', 1)->get();
        $companies  = Company::get();

        $rows       = User::where('id', '!=', 1)->UserSearch($search)->SearchCompany($comp)->SearchLevel($level)->SearchUsergroup($ug)->paginate(20);

        return view('users.index', compact('rows', 'companies', 'roles', 'groups', 'msg', 'search', 'ug', 'comp', 'level'));
    }

    public function create(Request $request)
    {
        $msg        = $request->session()->pull('session_msg', '');
        $groups     = UserGroup::get();
        $roles             = Role::where('id', '!=', 1)->get();
        $designations      = Designation::get();
        $companies  = Company::get();
        $statuses   = EmployeeStatus::orderby('name', 'asc')->get();
        $supervisories = User::where('job_level', '>', 3)->where('id', '!=', 1)->orderby('last_name', 'asc')->get();

        $id      =      0;
        $user    =      new User;

        return view('users.form', compact('id', 'statuses', 'designations', 'user', 'msg', 'companies', 'roles', 'groups', 'supervisories'));
    }

    public function store(UserValidation $request, $id)
    {
        $input      = $request->validated();

        $enable = $request->input('u_enabled');
        $company = $request->input('c_id');
        $firstname = $request->input('first_name');
        $lastname = $request->input('last_name');
        $dateHired = $request->input('date_hired'); // Assuming date_hired is in 'YYYY-MM-DD' format

        
            
        // Extract the year from the date_hired
        $yearHired = date('Y', strtotime($dateHired));
            
        // Function to normalize the string
        function normalizeString($string) {
            // Convert Ñ to lowercase ñ, remove special characters and spaces
            $string = str_replace(['Ñ', 'ñ'], 'ñ', $string); // Handle ñ case
            $string = preg_replace('/[^a-zA-Zñ]/', '', $string);
            return strtolower($string);
        }
        
        // Create normalized username
        $defaultUsername = normalizeString(substr($firstname, 0, 1) . $lastname);
        
        // Create password with first letter of first and last name, uppercase, without special chars
        $defaultPassword = strtoupper(substr(normalizeString($firstname), 0, 1)) 
                 . strtoupper(substr(normalizeString($lastname), 0, 1)) 
                 . 'cherry' 
                 . $yearHired;
        
        // Convert the date fields to the correct format
        $dateHired = $request->input('date_hired') ? Carbon::createFromFormat('m-d-Y', $request->input('date_hired'))->format('Y-m-d') : null;
        $dateSeparated = $request->input('date_separated') ? Carbon::createFromFormat('m-d-Y', $request->input('date_separated'))->format('Y-m-d') : null;
        $dateRegular = $request->input('date_regular') ? Carbon::createFromFormat('m-d-Y', $request->input('date_regular'))->format('Y-m-d') : null;

        // Add these formatted dates back into the request data
        $request->merge([
            'date_hired' => $dateHired,
            'date_separated' => $dateSeparated,
            'date_regular' => $dateRegular,
        ]);

        if ($id == 0) {
        $request->request->add([
            'created_by' => Auth::id(),
            'username' => $defaultUsername,
            'password' => bcrypt($defaultPassword),
        ]);
        
        // Create new user with formatted dates
        $user = User::create($request->all());

        $request->session()->put('session_msg', 'Record successfully added.');
        $request->session()->put('new_user_credentials', [
            'username' => $defaultUsername,
            'password' => $defaultPassword,
        ]);
            } else {
        $user = User::where('id', $id)->first();
        
        if (!$user) {
            $request->session()->put('session_msg', 'Record not found!');
            return redirect(route('employee.index'));
        }

        $checkboxFields = ['u_enabled', 'u_active'];

        foreach ($checkboxFields as $field) {
            $value = $request->has($field) ? 1 : 0;
            $user->$field = $value;
        }

        // Update existing user with formatted dates
        $user->update($request->all());

        $request->session()->put('session_msg', 'Record updated.');
    }

        return redirect(route('employee.index'));
    }
    
    public function edit(Request $request, $id)
    {
        $msg        = $request->session()->pull('session_msg', '');
        $user       = User::where('id', $id)->first();

        $groups     = UserGroup::get();
        $roles      = Role::where('id', '!=', 1)->get();
        $companies  = Company::get();
        $statuses   = EmployeeStatus::orderby('name', 'asc')->get();
        $designations      = Designation::get();
        $supervisories = User::where('id', '!=', 1)->orderby('last_name', 'asc')->get();

        if(!$user) {
            $request->session()->put('session_msg', 'Record not found!');
            return redirect(route('employee.index'));
        }
        return view('users.form', compact('id', 'msg', 'statuses', 'user', 'designations', 'companies', 'roles', 'groups', 'supervisories'));
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        if(!$user) {
            $request->session()->put('session_msg', 'Record not found!');
            return redirect(route('employee.index'));
        } else {
            $user->deleted_at = Carbon::now();
            $user->update();
            
            $request->session()->put('session_msg', 'Record deleted!');
            return redirect(route('employee.index'));
        }        
    }

    public function view(Request $request, $id)
    {
        $msg        = $request->session()->pull('session_msg', '');
        
        $employee       = User::where('id', $id)->first();

        $rows           = FinalGrade::where('employee_id', $employee->id)->orderby('created_at', 'desc')->orderby('period_id', 'asc')->paginate(20);

        return view('users.view', compact('msg', 'rows', 'id', 'employee'));
    }

    public function reset(Request $request, $appraisal_id)
    {
        $appraisal = PerformanceAppraisal::where('id', $appraisal_id)->first();
        if(!$appraisal) {
            $request->session()->put('session_msg', 'Record not found!');
            return redirect(route('employee.index'));
        } else {
            $appraisal->deleted_at = Carbon::now();
            $appraisal->appraisalRating()->delete();
            $final_grade1 = FinalGrade::where('appraisal1_id', $appraisal_id)->first();
            $final_grade2 = FinalGrade::where('appraisal2_id', $appraisal_id)->first();

            if($final_grade1)
            {
                $final_grade1->appraisal1_id = null;
                $final_grade1->appraisal1_score = null;
                $final_grade1->final_score = null;
                $final_grade1->update();
            }

            if($final_grade2)
            {
                $final_grade2->appraisal2_id = null;
                $final_grade2->appraisal2_score = null;
                $final_grade2->final_score = null;
                $final_grade2->update();
            }    
           
            $appraisal->update();

             // Dispatch the FinalGradeUpdated event
             event(new FinalGradeUpdated($appraisal->employee_id));
            
            $request->session()->put('session_msg', 'Appraisal Reset Successfull!');
            return redirect()->back();
        }        
    }
    public function active(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        if(!$user) {
            $request->session()->put('session_msg', 'Record not found!');
            return redirect(route('employee.index'));
        } else {
            $user->update(['u_active' => '1']);
            $request->session()->put('session_msg', 'Account Enabled!');
            return redirect(route('employee.index'));
        }      
    }
    
    public function enable(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        if(!$user) {
            $request->session()->put('session_msg', 'Record not found!');
            return redirect(route('employee.index'));
        } else {
            $user->update(['u_enabled' => '1']);
            $request->session()->put('session_msg', 'Account Enabled!');
            return redirect(route('employee.index'));
        }      
    }

    public function hrdownloadexcel($id)
    {
        $export = new FinalGradeExport($id);
        
        return Excel::download($export, 'final_grade.xlsx');
    }

    public function clearSession(Request $request)
    {
        $request->session()->forget('new_user_credentials');
        return response()->json(['status' => 'success']);
    }

    public function resetpassword(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        if(!$user) {
            $request->session()->put('session_msg', 'Record not found!');
            return redirect(route('employee.index'));
        } else {

            $firstname = $user->first_name;
            $lastname = $user->last_name;
            $dateHired = $user->date_hired;

            // Extract the year from the date_hired
            $yearHired = date('Y', strtotime($dateHired));

            // Create default user pass
            $defaultUsername = strtolower(substr($firstname, 0, 1) . $lastname);
            $defaultPassword = strtoupper(substr($firstname, 0, 1)) . strtoupper(substr($lastname, 0, 1)) . 'cherry' . $yearHired;

            $user->update(['password' => $defaultPassword]);

            $request->session()->put('new_user_credentials', [
                'username' => $defaultUsername,
                'password' => $defaultPassword,
            ]);

            $request->session()->put('session_msg', 'Password successfully reset!');
            return redirect()->back();
        }      
    }

    public function force_rate(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        if(!$user) {
            $request->session()->put('session_msg', 'Record not found!');
            return redirect(route('employee.index'));
        } else {
            $user->update(['force_rate' => 1]);
            $request->session()->put('session_msg', 'Passed to Supervisor!');
            return redirect(route('employee.index'));
        }      
    }
}
