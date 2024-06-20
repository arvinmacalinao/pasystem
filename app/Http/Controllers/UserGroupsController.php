<?php

namespace App\Http\Controllers;

use View;
use Carbon\Carbon;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserGroupsController extends Controller
{
    public function __construct() 
    {
		$data = [ 'page' => 'User Group' ];
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

        $rows       = UserGroup::paginate(20);

        return view('pages.ugroup.index', compact('rows', 'msg'));
    }

    public function create(Request $request)
    {
        $msg        = $request->session()->pull('session_msg', '');
    
        $id         = 0;
        $ugroup    = new UserGroup;

        return view('pages.ugroup.form', compact('id', 'ugroup', 'msg'));
    }

    public function store(Request $request, $id)
    {
        if($id == 0) {
            $ugroup     = UserGroup::create($request->all());
    
            $request->session()->put('session_msg', 'Record successfully added.');
        } else {
            $ugroup     = UserGroup::where('id', $id)->first();
            if(!$ugroup ) {
                $request->session()->put('session_msg', 'Record not found!');
                return redirect(route('ugroup.index'));
            }
            $ugroup->update($request->all());

            $request->session()->put('session_msg', 'Record updated.');
        }

        return redirect(route('ugroup.index'));
    }
    
    public function edit(Request $request, $id)
    {
        $msg        = $request->session()->pull('session_msg', '');
        $ugroup       = UserGroup::where('id', $id)->first();

        if(!$ugroup) {
            $request->session()->put('session_msg', 'Record not found!');
            return redirect(route('ugroup.index'));
        }
        return view('pages.ugroup.form', compact('id', 'msg', 'ugroup'));
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy(Request $request, $id)
    {
        $ugroup = UserGroup::where('id', $id)->first();
        if(!$ugroup) {
            $request->session()->put('session_msg', 'Record not found!');
            return redirect(route('ugroup.index'));
        } else {
            $ugroup->deleted_at = Carbon::now();
            $ugroup->update();
            
            $request->session()->put('session_msg', 'Record deleted!');
            return redirect(route('ugroup.index'));
        }        
    }
}
