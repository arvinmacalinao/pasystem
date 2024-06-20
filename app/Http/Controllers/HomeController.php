<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

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
        $msg        = $request->session()->pull('session_msg', '');
        
        $companies = Company::with('users.performanceAppraisals')->get();

        $companyData = $companies->map(function ($company) {
            $totalEmployees = $company->users->count();
            $ratedEmployees = $company->users->filter(function ($user) {
                return $user->performanceAppraisals->isNotEmpty();
            })->count();
            $lastRating = $company->users->flatMap->performanceAppraisals->sortByDesc('created_at')->first();
            $ratingPercentage = $totalEmployees > 0 ? ($ratedEmployees / $totalEmployees) * 100 : 0;

            return [
                'id' => $company->id,
                'name' => $company->name,
                'totalEmployees' => $totalEmployees,
                'ratingPercentage' => $ratingPercentage,
                'lastRating' => $lastRating ? $lastRating->created_at->format('Y-m-d') : 'N/A',
            ];
        });

        return view('home', ['companies' => $companyData, 'msg' => $msg]);
    }
}
