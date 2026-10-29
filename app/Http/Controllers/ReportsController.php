<?php

namespace App\Http\Controllers;

use View;
use App\Models\Role;
use App\Models\User;
use App\Models\Company;
use App\Models\UserGroup;
use App\Models\FinalGrade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CompleteRatingExport;


class ReportsController extends Controller
{
    public function __construct() 
    {
		$data = [ 'page' => 'Completed Rating Report' ];
		View::share('data', $data);

        $this->middleware(function ($request, $next) {  
            if(!Auth::user()) {
                abort(404);
            }

            // app('App\Http\Controllers\RecordLogController')->recordLog();
            
            return $next($request);
        });
	}

    public function complete_rating(Request $request)
    {
        $msg        = $request->session()->pull('session_msg', '');

        $search     = $request->input('qsearch', '');
        $ug         = $request->input('qug');
        $comp       = $request->input('qcomp', '');
        $level      = $request->input('qlevel', '');
        $year       = $request->input('qyear', '');
        $period     = $request->input('qperiod', '');
        $status     = $request->input('qstatus', '');

        $groups     = UserGroup::get();
        $roles      = Role::where('id', '!=', 1)->get();
        $companies  = Company::get();

        $rows = FinalGrade::where('final_grade', 1)
            ->SearchYear($year)
            ->SearchPeriod($period)
            ->whereHas('employee', function ($query) use ($search, $ug, $comp, $level, $status) {
                $query->UserSearch($search)
                      ->SearchCompany($comp)
                      ->SearchLevel($level)
                      ->SearchUsergroup($ug)
                      ->SearchStatus($status);
            })
            ->with(['employee.company', 'employee.group', 'employee.designation', 'employee.status'])
            ->orderby('updated_at', 'desc')
            ->paginate(20);
            

        return view('pages.reports.complete_rating', compact(
            'rows', 'companies', 'roles', 'groups', 'msg', 'search', 'ug', 'comp', 'level', 'status', 'year', 'period'
        ));
    }

    public function exportCompleteRating(Request $request)
    {
        $search     = $request->input('qsearch', '');
        $ug         = $request->input('qug');
        $comp       = $request->input('qcomp', '');
        $level      = $request->input('qlevel', '');
        $year       = $request->input('qyear', '');
        $period     = $request->input('qperiod', '');
        $status     = $request->input('qstatus', '');

        return Excel::download(new CompleteRatingExport($search, $comp, $level, $ug, $year, $period, $status), 'complete_rating.xlsx');
    }

    public function complete_rating2(Request $request)
    {
        $msg        = $request->session()->pull('session_msg', '');

        $search     = $request->input('qsearch', '');
        $ug         = $request->input('qug');
        $comp       = $request->input('qcomp', '');
        $level      = $request->input('qlevel', '');
        $year       = $request->input('qyear', '');
        $period     = $request->input('qperiod', '');
        $status     = $request->input('qstatus', '');


        $groups     = UserGroup::get();
        $roles      = Role::where('id', '!=', 1)->get();
        $companies  = Company::get();

        $rows = User::whereHas('finalGrade', function ($query)  {
                    $query->where('final_grade', 1);
                          
                })
                ->UserSearch($search)->SearchCompany($comp)->SearchLevel($level)->SearchUsergroup($ug)->paginate(20);
                
        session(['test_123' => compact('rows')]);
            
        return view('pages.reports.complete_rating', compact('rows', 'companies', 'roles', 'groups', 'msg', 'search', 'ug', 'comp', 'level', 'period', 'status', 'year'));
    }
}   