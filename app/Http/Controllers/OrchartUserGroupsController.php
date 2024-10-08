<?php

namespace App\Http\Controllers;

use View;
use Carbon\Carbon;
use App\Models\Company;
use App\Models\UserGroup;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\UtilityFunction;
use App\Models\CompanyUserGroup;
use Illuminate\Support\Facades\Auth;

class OrchartUserGroupsController extends Controller
{
    public function __construct() 
    {
		$data = [ 'page' => 'Department Orgcharts' ];
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
        $groups     = UserGroup::get();
        $companies  = Company::get();

        $rows       = CompanyUserGroup::paginate(20);

        return view('pages.ugroup.orgchart.index', compact('rows', 'msg'));
    }

    public function create(Request $request)
    {
        $msg        = $request->session()->pull('session_msg', '');
    
        $groups     = UserGroup::get();
        $companies  = Company::get();
        
        $id         = 0;
        $ugrouporgchart    = new CompanyUserGroup;

        return view('pages.ugroup.orgchart.form', compact('id', 'ugrouporgchart', 'groups', 'companies', 'msg'));
    }

    public function store(Request $request, $id)
    {   

        if($id == 0) {
            $ugrouporgchart     = CompanyUserGroup::create($request->except(['orgchart_file']));
            $ugrouporgchart     = CompanyUserGroup::where('id', $ugrouporgchart->id)->first();
            if($request->hasFile('orgchart_file')) {
                $file                   = $request->file('orgchart_file');
                $extension              = $file->getClientOriginalExtension();
                $name                   = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $new_filename           = UtilityFunction::sanitize_filename($name).'_'.Str::random(32).'.'.$extension;
                $file->storeAs('public/ugroup_docs', $new_filename);
                $ugrouporgchart->orgchart_filename    = $file->getClientOriginalName();
                $ugrouporgchart->orgchart_file        = $new_filename;
            }
            $ugrouporgchart->update($request->except(['orgchart_file']));
            $request->session()->put('session_msg', 'Record added.');
        } else {
            $ugrouporgchart = CompanyUserGroup::where('id', $id)->first();
            if(!$ugrouporgchart) {
                $request->session()->put('session_msg', 'Record not found!');
                return redirect(route('ugroup.orgchart.index'));
            } else {
                if($request->hasFile('orgchart_file')) {
                    $file               = $request->file('orgchart_file');
                    $extension          = $file->getClientOriginalExtension();
                    $name               = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                    $new_filename       = UtilityFunction::sanitize_filename($name).'_'.Str::random(32).'.'.$extension;
                    $file->storeAs('public/ugroup_docs', $new_filename);
                    $ugrouporgchart->orgchart_filename   = $file->getClientOriginalName();
                    $ugrouporgchart->orgchart_file       = $new_filename;
                }
                
                $request->request->add(['updated_by' => Auth::id(), 'updated_at' => Carbon::now()]);                
                $ugrouporgchart->update($request->except(['orgchart_file']));
            }
            $request->session()->put('session_msg', 'Record updated.');
        }        
        return redirect(route('ugroup.orgchart.index'));
    }

    public function edit(Request $request, $id)
    {
        $msg        = $request->session()->pull('session_msg', '');
        $ugrouporgchart       = CompanyUserGroup::where('id', $id)->first();
        $groups     = UserGroup::get();
        $companies  = Company::get();

        if(!$ugrouporgchart) {
            $request->session()->put('session_msg', 'Record not found!');
            return redirect(route('ugroup.orgchart.index'));
        }
        return view('pages.ugroup.orgchart.form', compact('id', 'msg', 'ugrouporgchart', 'groups', 'companies'));
    }

    public function destroy(Request $request, $id)
    {
        $ugrouporgchart = CompanyUserGroup::where('id', $id)->first();
        if(!$ugrouporgchart) {
            $request->session()->put('session_msg', 'Record not found!');
            return redirect(route('ugroup.orgchart.index'));
        } else {
            $ugrouporgchart->delete();
            
            $request->session()->put('session_msg', 'Record deleted!');
            return redirect(route('ugroup.orgchart.index'));
        }        
    }
}
