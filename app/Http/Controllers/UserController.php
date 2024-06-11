<?php

namespace App\Http\Controllers;

use View;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Company;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use App\Models\EmployeeStatus;
use Illuminate\Support\Facades\Auth;

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

        $rows       = User::where('id', '!=', 1)->paginate(20);
        $groups     = UserGroup::get();
        $roles      = Role::where('id', '!=', 1)->get();
        $companies  = Company::get();

        return view('users.index', compact('rows', 'companies', 'roles', 'groups', 'msg'));
    }

    public function create(Request $request)
    {
        $msg        = $request->session()->pull('session_msg', '');
        $groups     = UserGroup::get();
        $roles      = Role::where('id', '!=', 1)->get();
        $companies  = Company::get();
        $statuses   = EmployeeStatus::orderby('name', 'asc')->get();
        $supervisories = User::where('id', '!=', 1)->orderby('last_name', 'asc')->get();

        $id      =      0;
        $user    =      new User;

        return view('users.form', compact('id', 'statuses', 'user', 'msg', 'companies', 'roles', 'groups', 'supervisories'));
    }

    public function store(Request $request, $id)
    {
        $enable = $request->input('u_enabled');
        $company = $request->input('c_id');
        $firstname = $request->input('first_name');
        $lastname = $request->input('last_name');
        $dateHired = $request->input('date_hired'); // Assuming date_hired is in 'YYYY-MM-DD' format
            
        // Extract the year from the date_hired
        $yearHired = date('Y', strtotime($dateHired));
            
        // Create default user pass
        $defaultUsername = strtolower(substr($firstname, 0, 1) . $lastname);
        $defaultPassword = strtoupper(substr($firstname, 0, 1)) . strtoupper(substr($lastname, 0, 1)) . 'cherry' . $yearHired;
        
        if($id == 0) {
            $request->request->add(
                [
                    'created_by' => Auth::id(), 
                    'username' => $defaultUsername,
                    'password' => bcrypt($defaultPassword),
                ]
            );
            $user     = User::create($request->all());
    
            $request->session()->put('session_msg', 'Record successfully added.');
        } else {
            $user     = User::where('id', $id)->first();
            if(!$user ) {
                $request->session()->put('session_msg', 'Record not found!');
                return redirect(route('employee.index'));
            }
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
        $supervisories = User::where('id', '!=', 1)->orderby('last_name', 'asc')->get();

        if(!$user) {
            $request->session()->put('session_msg', 'Record not found!');
            return redirect(route('employee.index'));
        }
        return view('users.form', compact('id', 'msg', 'statuses', 'user', 'companies', 'roles', 'groups', 'supervisories'));
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
        $msg            = $request->session()->pull('session_msg', '');
        
        $rows           = Reservation::where('status_id', 1)->where('driver_id', $id)->orderby('start_date', 'desc')->paginate(20);
       
        return view('pages.driver.view', compact('rows', 'msg', 'id'));
    }
}
