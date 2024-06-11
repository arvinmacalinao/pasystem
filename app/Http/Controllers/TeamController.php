<?php

namespace App\Http\Controllers;

use View;
use App\Models\Role;
use App\Models\User;
use App\Models\Company;
use App\Models\UserGroup;
use Illuminate\Http\Request;
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

        $rows = $user->subordinates()->paginate(10);

        $groups     = UserGroup::get();
        $roles      = Role::where('id', '!=', 1)->get();
        $companies  = Company::get();

        return view('pages.team.index', compact('rows', 'companies', 'roles', 'groups', 'msg'));
    }

    public function rate(Request $request, $id)
    {
        $msg        = $request->session()->pull('session_msg', '');
        $user       = User::where('id', $id)->firstorFail();

        return view('pages.rate.form', compact('msg', 'user'));
    }

    public function appraise(Request $request, $id)
    {
        dd($request->all());
    }
}
