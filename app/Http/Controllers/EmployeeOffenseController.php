<?php

namespace App\Http\Controllers;

use View;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Company;
use App\Models\UserGroup;
use App\Models\Designation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\EmployeeOffense;
use App\Models\UtilityFunction;
use Illuminate\Support\Facades\Auth;

class EmployeeOffenseController extends Controller
{
    public function __construct() 
    {
		$data = [ 'page' => 'Employee Offenses' ];
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

        $rows       = EmployeeOffense::paginate(20);

        return view('pages.offenses.index', compact('rows', 'msg'));
    }

    public function create(Request $request)
    {
        $msg            = $request->session()->pull('session_msg', '');

        $users          = User::whereNot('id', 1)->orderby('last_name', 'asc')->get();
        $groups         = UserGroup::get();
        $designations   = Designation::get();
        $companies      = Company::get();

        $id         = 0;
        $eo    = new EmployeeOffense;

        return view('pages.offenses.form', compact('id', 'eo', 'msg', 'groups', 'designations', 'companies', 'users'));
    }

    public function store(Request $request, $id)
{
    // Retrieve selected user and related information
    $user = User::with(['company', 'designation', 'group'])->find($request->employee_id);

    // Convert the date fields to the correct format
    $date_committed = $request->input('date_committed') ? Carbon::createFromFormat('m-d-Y', $request->input('date_committed'))->format('Y-m-d') : null;

    if ($user) {
        // Handle potential null value
        $company = optional($user->company)->name ?? 'No Company';
        $department = optional($user->group)->name ?? 'No Department';
        $position = optional($user->designation)->name ?? 'No Designation';
        $employee_name = $user->Fullname;

        // Add retrieved details to the request for storage
        $request->merge([
            'c_id' => $user->c_id,
            'ug_id' => $user->ug_id,
            'd_id' => $user->d_id,
            'employee_name' => $employee_name,
            'company' => $company,
            'department' => $department,
            'position' => $position,
            'date_committed' => $date_committed,
        ]);
    } else {
        $request->session()->put('session_msg', 'User not found!');
        return redirect(route('employee.offenses.index'));
    }

    if ($id == 0) {
        // Create new offense entry
        $eo = EmployeeOffense::create($request->except(['eo_file']));

        // Handle file upload if file exists
        if ($request->hasFile('eo_file')) {
            $file = $request->file('eo_file');
            $extension = $file->getClientOriginalExtension();
            $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $new_filename = UtilityFunction::sanitize_filename($name) . '_' . Str::random(32) . '.' . $extension;
            $file->storeAs('public/eo_docs', $new_filename);

            // Update record with file info
            $eo->update([
                'eo_filename' => $file->getClientOriginalName(),
                'eo_file' => $new_filename,
            ]);
        }

        $request->session()->put('session_msg', 'Record added.');
    } else {
        // Update existing offense entry
        $eo = EmployeeOffense::find($id);
        if (!$eo) {
            $request->session()->put('session_msg', 'Record not found!');
            return redirect(route('employee.offenses.index'));
        }

        // Handle file upload if file exists
        if ($request->hasFile('eo_file')) {
            $file = $request->file('eo_file');
            $extension = $file->getClientOriginalExtension();
            $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $new_filename = UtilityFunction::sanitize_filename($name) . '_' . Str::random(32) . '.' . $extension;
            $file->storeAs('public/eo_docs', $new_filename);

            // Update record with file info
            $eo->update([
                'eo_filename' => $file->getClientOriginalName(),
                'eo_file' => $new_filename,
            ]);
        }

        // Add updated_by and updated_at info
        $request->merge(['updated_by' => Auth::id(), 'updated_at' => Carbon::now()]);

        // Update the record
        $eo->update($request->except(['eo_file']));

        $request->session()->put('session_msg', 'Record updated.');
    }

    return redirect(route('employee.offenses.index'));
    }

    
    public function edit(Request $request, $id)
    {
        $msg        = $request->session()->pull('session_msg', '');
        $eo       = EmployeeOffense::where('id', $id)->first();

        $users          = User::whereNot('id', 1)->orderby('last_name', 'asc')->get();

        if(!$eo) {
            $request->session()->put('session_msg', 'Record not found!');
            return redirect(route('employee.offenses.index'));
        }
        return view('pages.offenses.form', compact('id', 'msg', 'eo', 'users'));
    }

  
    public function destroy(Request $request, $id)
    {
        $eo = EmployeeOffense::where('id', $id)->first();
        if(!$eo) {
            $request->session()->put('session_msg', 'Record not found!');
            return redirect(route('employee.offenses.index'));
        } else {
            $eo->deleted_at = Carbon::now();
            $eo->update();
            
            $request->session()->put('session_msg', 'Record deleted!');
            return redirect(route('employee.offenses.index'));
        }        
    }

    public function view(Request $request, $id)
    {
        $msg        = $request->session()->pull('session_msg', '');
        
        $eo         = EmployeeOffense::where('id', $id)->first();

        return view('pages.offenses.view', compact('msg', 'id', 'eo'));
    }
}
