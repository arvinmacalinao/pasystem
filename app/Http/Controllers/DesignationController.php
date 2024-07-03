<?php

namespace App\Http\Controllers;

use View;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DesignationController extends Controller
{
    public function __construct() 
    {
		$data = [ 'page' => 'Designation' ];
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

        $rows       = Designation::paginate(20);

        return view('pages.designation.index', compact('rows', 'msg'));
    }

    public function create(Request $request)
    {
        $msg        = $request->session()->pull('session_msg', '');
    
        $id         = 0;
        $designation    = new Designation;

        return view('pages.designation.form', compact('id', 'designation', 'msg'));
    }

    public function store(Request $request, $id)
    {
        if($id == 0) {
            $designation     = Designation::create($request->all());
    
            $request->session()->put('session_msg', 'Record successfully added.');
        } else {
            $designation     = Designation::where('id', $id)->first();
            if(!$designation ) {
                $request->session()->put('session_msg', 'Record not found!');
                return redirect(route('designation.index'));
            }
            $designation->update($request->all());

            $request->session()->put('session_msg', 'Record updated.');
        }

        return redirect(route('designation.index'));
    }
    
    public function edit(Request $request, $id)
    {
        $msg        = $request->session()->pull('session_msg', '');
        $designation       = Designation::where('id', $id)->first();

        if(!$designation) {
            $request->session()->put('session_msg', 'Record not found!');
            return redirect(route('designation.index'));
        }
        return view('pages.designation.form', compact('id', 'msg', 'designation'));
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy(Request $request, $id)
    {
        $designation = Designation::where('id', $id)->first();
        if(!$designation) {
            $request->session()->put('session_msg', 'Record not found!');
            return redirect(route('designation.index'));
        } else {
            $designation->deleted_at = Carbon::now();
            $designation->update();
            
            $request->session()->put('session_msg', 'Record deleted!');
            return redirect(route('designation.index'));
        }        
    }
}
