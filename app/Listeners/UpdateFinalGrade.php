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
        $currentMonth = now()->month;
        $year = date('Y');

        if ($currentMonth >= 7 && $currentMonth <= 12) {
            $period_id = 1; // Current year for Period 1 (January-June)
        } else {
            $period_id = 2; // Previous year for Period 2 (July-December)
        }

        // Get the evaluator IDs
        $immediateSupervisor = User::where('id', $employee_id)->pluck('is_id')->first();
        $finalRater = User::where('id', $employee_id)->pluck('fr_id')->first();
        $employee_level = User::where('id', $employee_id)->pluck('job_level')->first();

        // Fetch relevant data (e.g., performance appraisals, attendance)
        $appraisal1 = PerformanceAppraisal::where('employee_id', $employee_id)
            ->where('evaluator_id', $immediateSupervisor)
            ->where('period_id', $period_id)
            ->whereYear('evaluation_date', $year)
            ->first();

        $appraisal2 = PerformanceAppraisal::where('employee_id', $employee_id)
            ->where('evaluator_id', $finalRater)
            ->where('period_id', $period_id)
            ->whereYear('evaluation_date', $year)
            ->first();

        $attendance = ActualAttendance::where('employee_id', $employee_id)
            ->where('period_id', $period_id)
            ->whereYear('created_at', $year)
            ->first();
        
            if ($attendance === null) {
                $attendance_score = 0;
            } else {
                $attendance_score = $attendance->attend_b_rating_score;
            }

            // Calculate appraisal scores
            $appraisal1_score = $appraisal1 ? ($appraisal1->appraisalRating->appraisal_rating_score + $attendance_score): null;
            $appraisal2_score = $appraisal2 ? ($appraisal2->appraisalRating->appraisal_rating_score + $attendance_score): null;

            // Calculate final score
            if ($appraisal1 && $appraisal2) {
                $final_score = ($appraisal1_score * 0.6) + ($appraisal2_score * 0.4);
            } else {
                $final_score = $appraisal1_score;
            }

        // Update or create FinalGrade record
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
                'appraisal1_score' => $appraisal1_score,
                'appraisal2_score' => $appraisal2_score,
                'attendance_score' => $attendance ? $attendance->attend_b_rating_score : null,
                'final_score' => $final_score ?? null,
            ]
        );
    }
}
