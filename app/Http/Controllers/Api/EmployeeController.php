<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = User::with([
            'company',
            'department',
            'designation',
            'status',
            'supervisor',
        ])
        ->where('u_active', 1)
        ->get()
        ->map(function ($user) {

            return [

                // Sync Key
                'employee_id' => $user->employee_code,

                // Personal Information
                'first_name' => $user->first_name,
                'middle_name' => $user->middle_name,
                'last_name' => $user->last_name,

                'name' => $user->full_name,

                'username' => $user->username,
                'email' => $user->email,

                // Company
                'company' => [
                    'id' => $user->c_id,
                    'name' => optional($user->company)->name,
                ],

                // Department
                'department' => [
                    'id' => $user->ug_id,
                    'name' => optional($user->department)->name,
                ],

                // Designation
                'designation' => [
                    'id' => $user->d_id,
                    'name' => optional($user->designation)->name,
                ],

                // Supervisor
                'supervisor' => [
                    'id' => $user->is_id,
                    'employee_id' => optional($user->supervisor)->employee_code,
                    'name' => optional($user->supervisor)->full_name,
                ],

                // Employment
                'employment_status' => [
                    'id' => $user->es_id,
                    'name' => optional($user->status)->name,
                ],

                'job_level' => [
                    'id' => $user->job_level,
                    'name' => optional($user->joblevel)->name,
                ],

                'date_hired' => $user->date_hired,
                'date_regularized' => $user->date_regular,
                'date_separated' => $user->date_separated,

                // Metadata
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ];
        });

        return response()->json($employees);
    }
}