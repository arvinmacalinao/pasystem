<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use App\Models\CompanyUserGroup;
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
        $period_id = ($currentMonth >= 1 && $currentMonth <= 6) ? 2 : 1; // Adjusted for period_id based on months
    
        // Get all companies with their users
        $companies = Company::with(['users' => function($query) {
            // Filter users by job level 1-10
            $query->whereBetween('job_level', [1, 10]);
        }])->get();
    
        $companyData = $companies->map(function ($company) use ($period_id) {
            // Get all employees with job levels 1-10
            $totalEmployees = $company->users->count();
        
            // Get the number of rated employees
            $ratedEmployees = $company->users->filter(function ($user) use ($period_id) {
                // Check if the employee has a final_grade of 1 for this period
                $hasFinalGrade = $user->final_grade->where('period_id', $period_id)->first();
                
                if ($hasFinalGrade && $hasFinalGrade->final_grade == 1) {
                    return true; // Rated employee with final_grade set to 1
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
    
        // Sort companies by rating percentage in descending order
        $sortedCompanyData = $companyData->sortByDesc('ratingPercentage')->values();
    
        return view('home', ['companies' => $sortedCompanyData, 'msg' => $msg]);
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

        // // Retrieve subordinates for both immediate supervisor and final rater
        // $subordinatesAsIS = User::where('is_id', $user->id)->pluck('ug_id');
        // $subordinatesAsFR = User::where('fr_id', $user->id)->pluck('ug_id');
        
        // // Combine the queries using union and remove duplicates with unique()
        // $rows = $subordinatesAsIS->merge($subordinatesAsFR)->unique()->sort()->values();

        // Retrieve subordinates' ug_id and c_id for both immediate supervisor and final rater
       // Retrieve subordinates' ug_id and c_id for both immediate supervisor and final rater as two separate collections
        $subordinatesAsIS = User::where('is_id', $user->id)->select('ug_id', 'c_id')->get();
        $subordinatesAsFR = User::where('fr_id', $user->id)->select('ug_id', 'c_id')->get();

        // Combine the collections manually into one array
        $allSubordinates = $subordinatesAsIS->concat($subordinatesAsFR)->unique(function ($item) {
            return $item->ug_id . '_' . $item->c_id;
        });
        
        // Now fetch the CompanyUserGroup entries for those combined `ug_id` and `c_id` values
        $rows = CompanyUserGroup::whereIn('ug_id', $allSubordinates->pluck('ug_id'))
        ->whereIn('c_id', $allSubordinates->pluck('c_id'))
        ->get();

        $companyusergrouporgchart = CompanyUserGroup::where('c_id', $user->c_id)->where('ug_id', $user->ug_id)->first();

        return view('org_chart', compact('msg', 'user', 'ugroup', 'company', 'rows', 'companyusergrouporgchart'));
    }

}
