<?php

namespace App\Exports;

use App\Models\FinalGrade;
use App\Models\PerformanceAppraisal;
use App\Models\User;
use App\Models\ActualAttendance;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Maatwebsite\Excel\Concerns\FromCollection;

class FinalGradeExport implements WithEvents
{
    protected $finalGradeId;

    public function __construct($finalGradeId)
    {
        $this->finalGradeId = $finalGradeId;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $finalGrade = FinalGrade::find($this->finalGradeId);
                $user = User::find($finalGrade->employee_id);
                
                $current = Carbon::now()->format('YmdHs');

                if($finalGrade->period_id == 1){
                    $period = 'Jan-June';
                }

                $level = $user->job_level;

                if ($level >= 1 && $level <= 3) {
                    $job_rank = 'Rank and File';
                    $templatePath = storage_path('app/templates/PAMatrix_RankandFile.xlsx');
                } elseif ($level >= 4 && $level <= 5) {
                    $job_rank = 'Technical/Professional/Specialist Rank and File';
                    $templatePath = storage_path('app/templates/PAMatrix_Tech.Prof.SpecRankandFile.xlsx');
                } elseif ($level >= 6 && $level <= 7) {
                    $job_rank = 'Supervisors/Senior Supervisors';
                    $templatePath = storage_path('app/templates/PAMatrix_Sup.xlsx');
                } elseif ($level >= 8 && $level <= 9) {
                    $job_rank = 'Assistant Managers/Managers';
                    $templatePath = storage_path('app/templates/PAMatrix_Managers.xlsx');
                } elseif ($level >= 10 && $level <= 11) {
                    $job_rank = 'Senior Managers and Executives';
                    $templatePath = storage_path('app/templates/PAMatrix_Sr.Manager.Executive.xlsx');
                }

                $appraisal1 = PerformanceAppraisal::find($finalGrade->appraisal1_id);
                $attendance = ActualAttendance::find($finalGrade->attendance_id);

                $attendb_rating_score = ($attendance->late_rating_score + $attendance->ut_rating_score + $attendance->ul_rating_score) / 3;

                // Load the existing template
                $templatePath = storage_path('app/templates/PAMatrix_RankandFile.xlsx');
                $spreadsheet = IOFactory::load($templatePath);

                // Get the active sheet
                $sheet = $spreadsheet->getActiveSheet();

                // Insert data into specific cells
                $sheet->setCellValue('B3', $period . ' - ' . $finalGrade->year);
                $sheet->setCellValue('B4', $user->FullName);
                $sheet->setCellValue('B5', $user->company->name);
                $sheet->setCellValue('B6', $user->group->name);
                $sheet->setCellValue('B7', $user->designation->name);
                $sheet->setCellValue('B8', $job_rank);

                if($appraisal1 && $appraisal1->appraisalRating->form_id == 1) {
                    $sheet->setCellValue('C13', $appraisal1->appraisalRating->jk_rating_score);
                    $sheet->setCellValue('C14', $appraisal1->appraisalRating->quality_rating_score);
                    $sheet->setCellValue('C15', $appraisal1->appraisalRating->quantity_rating_score);
                    $sheet->setCellValue('C16', $appraisal1->appraisalRating->initiative_rating_score);
                    $sheet->setCellValue('C17', $appraisal1->appraisalRating->coop_rating_score);
                    $sheet->setCellValue('C18', $appraisal1->appraisalRating->comms_rating_score);
                    $sheet->setCellValue('C19', $appraisal1->appraisalRating->comp_rating_score);
                    $sheet->setCellValue('C20', $appraisal1->appraisalRating->attend_rating_score);
                }

                $sheet->setCellValue('C21', $attendb_rating_score);

                // Save the modified template as a new file and download
                $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                $writer->save(storage_path('app/exports/final_grade_' . '' . $this->finalGradeId . '.xlsx'));

                // You can also use a stream to download the file directly
                $event->writer->getDelegate()->getProperties()->setTitle('Final Grade');
                $event->writer->setSpreadsheet($spreadsheet);
            },
        ];
    }
}
