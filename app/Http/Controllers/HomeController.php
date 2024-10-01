<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $msg = $request->session()->pull('session_msg', '');
    
        // Get current month and determine the period
        $currentMonth = date('m');
        $period_id = ($currentMonth >= 2 && $currentMonth <= 7) ? 1 : 2;
    
        // Get all companies with their users
        $companies = Company::with(['users' => function($query) use ($period_id) {
            // Filter users by job level 1-10
            $query->whereBetween('job_level', [1, 10]);
        }])->paginate(10);
    
        $companyData = $companies->map(function ($company) use ($period_id) {
            // Get all employees with job levels 1-10
            $totalEmployees = $company->users->count();
        
            // Get the number of rated employees
            $ratedEmployees = $company->users->filter(function ($user) use ($period_id) {
                if ($user->job_level <= 9) {
                    return $user->final_grade->where('period_id', $period_id)->isNotEmpty();
                } elseif ($user->job_level >= 10) {
                    return $user->final_grade->isNotEmpty();
                }
                return false;
            })->count();
        
            return [
                'id' => $company->id,
                'name' => $company->name,
                'totalEmployees' => $totalEmployees,
                'ratedEmployees' => $ratedEmployees,
                'ratingPercentage' => $totalEmployees > 0 ? ($ratedEmployees / $totalEmployees) * 100 : 0,
                'lastRating' => $company->users->flatMap->performanceAppraisals->sortByDesc('created_at')->first()?->created_at->format('Y-m-d') ?? 'N/A',
            ];
        });
    
        return view('home', ['companies' => $companyData, 'msg' => $msg]);
    }

    public function joblevel(Request $request)
    {
        $msg = $request->session()->pull('session_msg', '');

        return view('job_level', compact('msg'));
    }

    public function orgchart(Request $request)
    {
        $msg = $request->session()->pull('session_msg', '');

        $user = User::where('id', Auth::id())->first();

        $ugroup = UserGroup::where('id', $user->ug_id)->first();

        $company = Company::where('id', $user->c_id)->first();

        // Retrieve subordinates for both immediate supervisor and final rater
        $subordinatesAsIS = User::where('is_id', $user->id)->pluck('ug_id');
        $subordinatesAsFR = User::where('fr_id', $user->id)->pluck('ug_id');
        
        // Combine the queries using union and remove duplicates with unique()
        $rows = $subordinatesAsIS->merge($subordinatesAsFR)->unique()->sort()->values();

        return view('org_chart', compact('msg', 'user', 'ugroup', 'company', 'rows'));
    }

}
