<?php

namespace App\Http\Controllers;

use View;
use Carbon\Carbon;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function __construct() 
    {
		$data = [ 'page' => 'Role' ];
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

        $rows       = Role::paginate(20);

        return view('pages.role.index', compact('rows', 'msg'));
    }

    public function create(Request $request)
    {
        $msg        = $request->session()->pull('session_msg', '');
    
        $id         = 0;
        $role    = new Role;

        return view('pages.role.form', compact('id', 'role', 'msg'));
    }

    public function store(Request $request, $id)
    {
        if($id == 0) {
            $role     = Role::create($request->all());
    
            $request->session()->put('session_msg', 'Record successfully added.');
        } else {
            $role     = Role::where('id', $id)->first();
            if(!$role ) {
                $request->session()->put('session_msg', 'Record not found!');
                return redirect(route('role.index'));
            }
            $role->update($request->all());

            $request->session()->put('session_msg', 'Record updated.');
        }

        return redirect(route('role.index'));
    }
    
    public function edit(Request $request, $id)
    {
        $msg        = $request->session()->pull('session_msg', '');
        $role       = Role::where('id', $id)->first();

        if(!$role) {
            $request->session()->put('session_msg', 'Record not found!');
            return redirect(route('role.index'));
        }
        return view('pages.role.form', compact('id', 'msg', 'role'));
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy(Request $request, $id)
    {
        $role = Role::where('id', $id)->first();
        if(!$role) {
            $request->session()->put('session_msg', 'Record not found!');
            return redirect(route('role.index'));
        } else {
            $role->deleted_at = Carbon::now();
            $role->update();
            
            $request->session()->put('session_msg', 'Record deleted!');
            return redirect(route('role.index'));
        }        
    }
}
