<?php

namespace App\Http\Controllers;

use View;
use App\Models\Role;
use App\Models\User;
use App\Models\Company;
use App\Models\UserGroup;
use App\Models\Designation;
use Illuminate\Http\Request;
use App\Models\EmployeeStatus;
use App\Models\PerformanceAppraisal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function __construct() 
    {
		$data = [ 'page' => 'Profile' ];
		View::share('data', $data);

        $this->middleware(function ($request, $next) {  
            if(!Auth::user()) {
                abort(404);
            }

            // app('App\Http\Controllers\RecordLogController')->recordLog();
            
            return $next($request);
        });
	}
    
    public function show(Request $request, $id)
    {
        $msg        = $request->session()->pull('session_msg', '');
        $auth_id    = Auth::id();
        
        $user       = User::where('id', $auth_id)->first();

        $rows       = PerformanceAppraisal::where('employee_id', $auth_id)->orderby('created_at', 'desc')->orderby('period_id', 'asc')->paginate(20);



        return view('auth.profile', compact('user', 'msg', 'id', 'rows'));
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
            return redirect(route('auth.profile'));
        }
        return view('auth.edit', compact('id', 'msg', 'statuses', 'user', 'designations', 'companies', 'roles', 'groups', 'supervisories'));
    }

    public function store(Request $request, $id)
    {
       
        $user     = User::where('id', $id)->first();
        
        if(!$user ) {
            $request->session()->put('session_msg', 'Record not found!');
            return redirect(route('auth.profile'));
        }   
        $user->update($request->all());
        $request->session()->put('session_msg', 'Record updated.');

        return redirect(route('auth.profile'));
    }
}
