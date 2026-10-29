<?php

namespace App\Listeners;

use App\Models\User;
use App\Models\FinalGrade;
use App\Models\ActualAttendance;
use App\Events\FinalGradeUpdated;
use App\Models\PerformanceAppraisal;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateFinalGrade
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\FinalGradeUpdated  $event
     * @return void
     */
    public function handle(FinalGradeUpdated $event)
    {
        $employee_id = $event->employee_id;
        $period_id = $event->period_id;
        $currentMonth = now()->month;
        // $year = 2025;
        $year = date('Y');
        
        if ($currentMonth >= 7 && $currentMonth <= 12) {
            $year = $year; // Current year for Period 1 (January-June)
        } else {
            $year = $year - 1 ; // Previous year for Period 2 (July-December)
        }

        // An explicit year (e.g. late encoding by HR) overrides the date-based default
        if ($event->year) {
            $year = (int) $event->year;
        }
    
        // Get the evaluator IDs
        $employee = User::where('id', $employee_id)->first();
        $immediateSupervisor = User::where('id', $employee_id)->pluck('is_id')->first();
        $finalRater = User::where('id', $employee_id)->pluck('fr_id')->first();
        $employee_level = User::where('id', $employee_id)->pluck('job_level')->first();


        if($period_id == 3){
            $attendance = ActualAttendance::where('employee_id', $employee_id)
            ->where('period_id', $period_id)
            ->whereYear('created_at', $year)
            ->first();

            // dd($attendance);

            $appraisal1 = PerformanceAppraisal::where('employee_id', $employee_id)
                ->where('evaluator_id', $immediateSupervisor)
                ->where('period_id', $period_id)
                ->whereYear('created_at', $year)
                ->where('start_month', optional($attendance)->start_month)
                ->where('status', 'submitted')
                ->first();

            $appraisal2 = null; 

            if ($appraisal1) {
                $appraisal2 = PerformanceAppraisal::where('employee_id', $employee_id)
                    ->where('evaluator_id', $finalRater)
                    ->where('period_id', $period_id)
                    ->whereYear('created_at', $year)
                    ->where('start_month', optional($attendance)->start_month)
                    ->where('status', 'submitted')
                    ->first();
            }
        }
        else
        {
            // Fetch relevant data (e.g., performance appraisals, attendance)
        $appraisal1 = PerformanceAppraisal::where('employee_id', $employee_id)
        ->where('evaluator_id', $immediateSupervisor)
        ->where('period_id', $period_id)
        ->whereYear('created_at', $year)
        ->where('status', 'submitted')
        ->first();

        $appraisal2 = PerformanceAppraisal::where('employee_id', $employee_id)
            ->where('evaluator_id', $finalRater)
            ->where('period_id', $period_id)
            ->whereYear('created_at', $year)
            ->where('status', 'submitted')
            ->first();

        $attendance = ActualAttendance::where('employee_id', $employee_id)
        ->where('period_id', $period_id)
        ->whereYear('created_at', $year)
        ->first();
        }
            // Calculate appraisal scores
            $attendance_score = $attendance->attend_b_rating_score ?? 0;
            $appraisal1_score = $appraisal1 ? ($appraisal1->appraisalRating->appraisal_rating_score ?? 0) + $attendance_score : null;
            $appraisal2_score = $appraisal2 ? ($appraisal2->appraisalRating->appraisal_rating_score ?? 0) + $attendance_score : null;

            // Calculate final score
            if ($appraisal1 && $appraisal2) {
                $final_score = ($appraisal1_score * 0.6) + ($appraisal2_score * 0.4);
            } else {
                $final_score = $appraisal1_score;
            }

        if ($employee->job_level >= 10 && $employee->job_level <= 11) {
            // For job levels 10 and 11, only appraisal1 is required
            if ($appraisal1) {
                $final_grade = 1;
            } else {
                $final_grade = 0;
            }
        } else {
            // For other job levels
            if ($employee->fr_id === null) {
                // If fr_id is null, only appraisal1 and attendance are required
                if ($appraisal1 && $attendance) {
                    $final_grade = 1;
                } else {
                    $final_grade = 0;
                }
            } else {
                // If fr_id is not null, appraisal1, appraisal2, and attendance are required
                if ($appraisal1 && $appraisal2 && $attendance) {
                    $final_grade = 1;
                } else {
                    $final_grade = 0;
                }
            }
        }
            
        $finalGrade = FinalGrade::updateOrCreate(
            [
                'employee_id' => $employee_id,
                'period_id' => $period_id,
                'year' => $year,
            ],
            [
                'appraisal1_id' => $appraisal1 ? $appraisal1->id : null,
                'appraisal2_id' => $appraisal2 ? $appraisal2->id : null,
                'attendance_id' => $attendance ? $attendance->id : null,
                'appraisal1_score' => $appraisal1->appraisalRating->appraisal_rating_score ?? 0,
                'appraisal2_score' => $appraisal2->appraisalRating->appraisal_rating_score ?? 0,
                'attendance_score' => $attendance ? $attendance->attend_b_rating_score : null,
                'final_score' => $final_score ?? null,
                'final_grade' => $final_grade,
                'created_at' => now()->subMonths(6),
                'updated_at' => now()->subMonths(6),
            ]
        );
    }
}