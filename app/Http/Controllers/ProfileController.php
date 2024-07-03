<?php

namespace App\Http\Controllers;

use View;
use App\Models\User;
use Illuminate\Http\Request;
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
}
