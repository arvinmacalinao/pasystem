<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\User;
use App\Models\FinalGrade;
use App\Models\ActualAttendance;
use App\Models\PerformanceAppraisal;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;

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
                    $templatePath = storage_path('app/templates/PAMatrix_RankandFile.xlsx');

                    $appraisal1 = PerformanceAppraisal::find($finalGrade->appraisal1_id);
                    $appraisal2 = PerformanceAppraisal::find($finalGrade->appraisal2_id);
                    $attendance = ActualAttendance::find($finalGrade->attendance_id);

                    $attendb_rating_score = ($attendance->late_rating_score + $attendance->ut_rating_score + $attendance->ul_rating_score) / 3;

                    $spreadsheet = IOFactory::load($templatePath);

                    // Get the active sheet
                    $sheet = $spreadsheet->getActiveSheet();

                    // Insert data into specific cells
                    $sheet->setCellValue('B3', $appraisal1->period);
                    $sheet->setCellValue('B4', $appraisal1->name);
                    $sheet->setCellValue('B5', $appraisal1->company);
                    $sheet->setCellValue('B6', $appraisal1->group);
                    $sheet->setCellValue('B7', $appraisal1->designation);
                    $sheet->setCellValue('B8', $appraisal1->job_rank);

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
                    if($user->fr_id == null){
                        if($appraisal1 && $appraisal1->appraisalRating->form_id == 1) {
                            $sheet->setCellValue('E13', $appraisal1->appraisalRating->jk_rating_score);
                            $sheet->setCellValue('E14', $appraisal1->appraisalRating->quality_rating_score);
                            $sheet->setCellValue('E15', $appraisal1->appraisalRating->quantity_rating_score);
                            $sheet->setCellValue('E16', $appraisal1->appraisalRating->initiative_rating_score);
                            $sheet->setCellValue('E17', $appraisal1->appraisalRating->coop_rating_score);
                            $sheet->setCellValue('E18', $appraisal1->appraisalRating->comms_rating_score);
                            $sheet->setCellValue('E19', $appraisal1->appraisalRating->comp_rating_score);
                            $sheet->setCellValue('E20', $appraisal1->appraisalRating->attend_rating_score);
                        }
                    }
                    else
                    {
                        if($appraisal2 && $appraisal2->appraisalRating->form_id == 1) {
                            $sheet->setCellValue('E13', $appraisal2->appraisalRating->jk_rating_score);
                            $sheet->setCellValue('E14', $appraisal2->appraisalRating->quality_rating_score);
                            $sheet->setCellValue('E15', $appraisal2->appraisalRating->quantity_rating_score);
                            $sheet->setCellValue('E16', $appraisal2->appraisalRating->initiative_rating_score);
                            $sheet->setCellValue('E17', $appraisal2->appraisalRating->coop_rating_score);
                            $sheet->setCellValue('E18', $appraisal2->appraisalRating->comms_rating_score);
                            $sheet->setCellValue('E19', $appraisal2->appraisalRating->comp_rating_score);
                            $sheet->setCellValue('E20', $appraisal2->appraisalRating->attend_rating_score);
                        }
                    }
                    

                $sheet->setCellValue('C21', $attendb_rating_score);
                $sheet->setCellValue('E21', $attendb_rating_score);

                } elseif ($level >= 4 && $level <= 5) {
                    $templatePath = storage_path('app/templates/PAMatrix_Tech.Prof.SpecRankandFile.xlsx');

                    $appraisal1 = PerformanceAppraisal::find($finalGrade->appraisal1_id);
                    $appraisal2 = PerformanceAppraisal::find($finalGrade->appraisal2_id);
                    $attendance = ActualAttendance::find($finalGrade->attendance_id);

                    $attendb_rating_score = ($attendance->late_rating_score + $attendance->ut_rating_score + $attendance->ul_rating_score) / 3;

                    $spreadsheet = IOFactory::load($templatePath);

                    // Get the active sheet
                    $sheet = $spreadsheet->getActiveSheet();

                    // Insert data into specific cells
                    $sheet->setCellValue('B3', $appraisal1->period);
                    $sheet->setCellValue('B4', $appraisal1->name);
                    $sheet->setCellValue('B5', $appraisal1->company);
                    $sheet->setCellValue('B6', $appraisal1->group);
                    $sheet->setCellValue('B7', $appraisal1->designation);
                    $sheet->setCellValue('B8', $appraisal1->job_rank);

                    if($appraisal1 && $appraisal1->appraisalRating->form_id == 2) {
                        $sheet->setCellValue('C13', $appraisal1->appraisalRating->jk_rating_score);
                        $sheet->setCellValue('C14', $appraisal1->appraisalRating->quality_rating_score);
                        $sheet->setCellValue('C15', $appraisal1->appraisalRating->quantity_rating_score);
                        $sheet->setCellValue('C16', $appraisal1->appraisalRating->ps_rating_score);
                        $sheet->setCellValue('C17', $appraisal1->appraisalRating->inno_rating_score);
                        $sheet->setCellValue('C18', $appraisal1->appraisalRating->tw_rating_score);
                        $sheet->setCellValue('C19', $appraisal1->appraisalRating->comms_rating_score);
                        $sheet->setCellValue('C20', $appraisal1->appraisalRating->comp_rating_score);
                        $sheet->setCellValue('C21', $appraisal1->appraisalRating->attend_rating_score);
                    }
                    if($user->fr_id == null){
                        if($appraisal1 && $appraisal1->appraisalRating->form_id == 2) {
                            $sheet->setCellValue('E13', $appraisal1->appraisalRating->jk_rating_score);
                            $sheet->setCellValue('E14', $appraisal1->appraisalRating->quality_rating_score);
                            $sheet->setCellValue('E15', $appraisal1->appraisalRating->quantity_rating_score);
                            $sheet->setCellValue('E16', $appraisal1->appraisalRating->ps_rating_score);
                            $sheet->setCellValue('E17', $appraisal1->appraisalRating->inno_rating_score);
                            $sheet->setCellValue('E18', $appraisal1->appraisalRating->tw_rating_score);
                            $sheet->setCellValue('E19', $appraisal1->appraisalRating->comms_rating_score);
                            $sheet->setCellValue('E20', $appraisal1->appraisalRating->comp_rating_score);
                            $sheet->setCellValue('E21', $appraisal1->appraisalRating->attend_rating_score);
                        }
                    }
                    else{
                        if($appraisal2 && $appraisal2->appraisalRating->form_id == 2) {
                            $sheet->setCellValue('E13', $appraisal2->appraisalRating->jk_rating_score);
                            $sheet->setCellValue('E14', $appraisal2->appraisalRating->quality_rating_score);
                            $sheet->setCellValue('E15', $appraisal2->appraisalRating->quantity_rating_score);
                            $sheet->setCellValue('E16', $appraisal2->appraisalRating->ps_rating_score);
                            $sheet->setCellValue('E17', $appraisal2->appraisalRating->inno_rating_score);
                            $sheet->setCellValue('E18', $appraisal2->appraisalRating->tw_rating_score);
                            $sheet->setCellValue('E19', $appraisal2->appraisalRating->comms_rating_score);
                            $sheet->setCellValue('E20', $appraisal2->appraisalRating->comp_rating_score);
                            $sheet->setCellValue('E21', $appraisal2->appraisalRating->attend_rating_score);
                        }
                    }

                $sheet->setCellValue('C22', $attendb_rating_score);
                $sheet->setCellValue('E22', $attendb_rating_score);

                } elseif ($level >= 6 && $level <= 7) {
                    $templatePath = storage_path('app/templates/PAMatrix_Sup.xlsx');

                    $appraisal1 = PerformanceAppraisal::find($finalGrade->appraisal1_id);
                    $appraisal2 = PerformanceAppraisal::find($finalGrade->appraisal2_id);
                    $attendance = ActualAttendance::find($finalGrade->attendance_id);

                    $attendb_rating_score = ($attendance->late_rating_score + $attendance->ut_rating_score + $attendance->ul_rating_score) / 3;

                    $spreadsheet = IOFactory::load($templatePath);

                    // Get the active sheet
                    $sheet = $spreadsheet->getActiveSheet();

                    // Insert data into specific cells
                    $sheet->setCellValue('B3', $appraisal1->period);
                    $sheet->setCellValue('B4', $appraisal1->name);
                    $sheet->setCellValue('B5', $appraisal1->company);
                    $sheet->setCellValue('B6', $appraisal1->group);
                    $sheet->setCellValue('B7', $appraisal1->designation);
                    $sheet->setCellValue('B8', $appraisal1->job_rank);

                    if($appraisal1 && $appraisal1->appraisalRating->form_id == 3) {
                        $sheet->setCellValue('C13', $appraisal1->appraisalRating->jk_rating_score);
                        $sheet->setCellValue('C14', $appraisal1->appraisalRating->quality_rating_score);
                        $sheet->setCellValue('C15', $appraisal1->appraisalRating->quantity_rating_score);
                        $sheet->setCellValue('C16', $appraisal1->appraisalRating->pm_rating_score);
                        $sheet->setCellValue('C17', $appraisal1->appraisalRating->ps_rating_score);
                        $sheet->setCellValue('C18', $appraisal1->appraisalRating->judgment_rating_score);
                        $sheet->setCellValue('C19', $appraisal1->appraisalRating->leadership_rating_score);
                        $sheet->setCellValue('C20', $appraisal1->appraisalRating->inno_rating_score);
                        $sheet->setCellValue('C21', $appraisal1->appraisalRating->comms_rating_score);
                        $sheet->setCellValue('C22', $appraisal1->appraisalRating->comp_rating_score);
                        $sheet->setCellValue('C23', $appraisal1->appraisalRating->attend_rating_score);
                    }
                    if($user->fr_id == null){
                        if($appraisal1 && $appraisal1->appraisalRating->form_id == 3) {
                            $sheet->setCellValue('E13', $appraisal1->appraisalRating->jk_rating_score);
                            $sheet->setCellValue('E14', $appraisal1->appraisalRating->quality_rating_score);
                            $sheet->setCellValue('E15', $appraisal1->appraisalRating->quantity_rating_score);
                            $sheet->setCellValue('E16', $appraisal1->appraisalRating->pm_rating_score);
                            $sheet->setCellValue('E17', $appraisal1->appraisalRating->ps_rating_score);
                            $sheet->setCellValue('E18', $appraisal1->appraisalRating->judgment_rating_score);
                            $sheet->setCellValue('E19', $appraisal1->appraisalRating->leadership_rating_score);
                            $sheet->setCellValue('E20', $appraisal1->appraisalRating->inno_rating_score);
                            $sheet->setCellValue('E21', $appraisal1->appraisalRating->comms_rating_score);
                            $sheet->setCellValue('E22', $appraisal1->appraisalRating->comp_rating_score);
                            $sheet->setCellValue('E23', $appraisal1->appraisalRating->attend_rating_score);
                        }
                    }
                    else{
                        if($appraisal2 && $appraisal2->appraisalRating->form_id == 3) {
                            $sheet->setCellValue('E13', $appraisal2->appraisalRating->jk_rating_score);
                            $sheet->setCellValue('E14', $appraisal2->appraisalRating->quality_rating_score);
                            $sheet->setCellValue('E15', $appraisal2->appraisalRating->quantity_rating_score);
                            $sheet->setCellValue('E16', $appraisal2->appraisalRating->pm_rating_score);
                            $sheet->setCellValue('E17', $appraisal2->appraisalRating->ps_rating_score);
                            $sheet->setCellValue('E18', $appraisal2->appraisalRating->judgment_rating_score);
                            $sheet->setCellValue('E19', $appraisal2->appraisalRating->leadership_rating_score);
                            $sheet->setCellValue('E20', $appraisal2->appraisalRating->inno_rating_score);
                            $sheet->setCellValue('E21', $appraisal2->appraisalRating->comms_rating_score);
                            $sheet->setCellValue('E22', $appraisal2->appraisalRating->comp_rating_score);
                            $sheet->setCellValue('E23', $appraisal2->appraisalRating->attend_rating_score);
                        }
                    }

                $sheet->setCellValue('C24', $attendb_rating_score);
                $sheet->setCellValue('E24', $attendb_rating_score);

                } elseif ($level >= 8 && $level <= 9) {
                    $templatePath = storage_path('app/templates/PAMatrix_Managers.xlsx');

                    $appraisal1 = PerformanceAppraisal::find($finalGrade->appraisal1_id);
                    $appraisal2 = PerformanceAppraisal::find($finalGrade->appraisal2_id);
                    $attendance = ActualAttendance::find($finalGrade->attendance_id);

                    $attendb_rating_score = ($attendance->late_rating_score + $attendance->ut_rating_score + $attendance->ul_rating_score) / 3;

                    $spreadsheet = IOFactory::load($templatePath);

                    // Get the active sheet
                    $sheet = $spreadsheet->getActiveSheet();

                    // Insert data into specific cells
                    $sheet->setCellValue('B3', $appraisal1->period);
                    $sheet->setCellValue('B4', $appraisal1->name);
                    $sheet->setCellValue('B5', $appraisal1->company);
                    $sheet->setCellValue('B6', $appraisal1->group);
                    $sheet->setCellValue('B7', $appraisal1->designation);
                    $sheet->setCellValue('B8', $appraisal1->job_rank);

                    if($appraisal1 && $appraisal1->appraisalRating->form_id == 4) {
                        $sheet->setCellValue('C13', $appraisal1->appraisalRating->jk_rating_score);
                        $sheet->setCellValue('C14', $appraisal1->appraisalRating->quality_rating_score);
                        $sheet->setCellValue('C15', $appraisal1->appraisalRating->quantity_rating_score);
                        $sheet->setCellValue('C16', $appraisal1->appraisalRating->pm_rating_score);
                        $sheet->setCellValue('C17', $appraisal1->appraisalRating->ps_rating_score);
                        $sheet->setCellValue('C18', $appraisal1->appraisalRating->judgment_rating_score);
                        $sheet->setCellValue('C19', $appraisal1->appraisalRating->leadership_rating_score);
                        $sheet->setCellValue('C20', $appraisal1->appraisalRating->inno_rating_score);
                        $sheet->setCellValue('C21', $appraisal1->appraisalRating->comms_rating_score);
                        $sheet->setCellValue('C22', $appraisal1->appraisalRating->comp_rating_score);
                        $sheet->setCellValue('C23', $appraisal1->appraisalRating->attend_rating_score);
                    }
                    if($user->fr_id == null){
                        if($appraisal1 && $appraisal1->appraisalRating->form_id == 4) {
                            $sheet->setCellValue('E13', $appraisal1->appraisalRating->jk_rating_score);
                            $sheet->setCellValue('E14', $appraisal1->appraisalRating->quality_rating_score);
                            $sheet->setCellValue('E15', $appraisal1->appraisalRating->quantity_rating_score);
                            $sheet->setCellValue('E16', $appraisal1->appraisalRating->pm_rating_score);
                            $sheet->setCellValue('E17', $appraisal1->appraisalRating->ps_rating_score);
                            $sheet->setCellValue('E18', $appraisal1->appraisalRating->judgment_rating_score);
                            $sheet->setCellValue('E19', $appraisal1->appraisalRating->leadership_rating_score);
                            $sheet->setCellValue('E20', $appraisal1->appraisalRating->inno_rating_score);
                            $sheet->setCellValue('E21', $appraisal1->appraisalRating->comms_rating_score);
                            $sheet->setCellValue('E22', $appraisal1->appraisalRating->comp_rating_score);
                            $sheet->setCellValue('E23', $appraisal1->appraisalRating->attend_rating_score);
                        }
                    }
                    else{
                        if($appraisal2 && $appraisal2->appraisalRating->form_id == 4) {
                            $sheet->setCellValue('E13', $appraisal2->appraisalRating->jk_rating_score);
                            $sheet->setCellValue('E14', $appraisal2->appraisalRating->quality_rating_score);
                            $sheet->setCellValue('E15', $appraisal2->appraisalRating->quantity_rating_score);
                            $sheet->setCellValue('E16', $appraisal2->appraisalRating->pm_rating_score);
                            $sheet->setCellValue('E17', $appraisal2->appraisalRating->ps_rating_score);
                            $sheet->setCellValue('E18', $appraisal2->appraisalRating->judgment_rating_score);
                            $sheet->setCellValue('E19', $appraisal2->appraisalRating->leadership_rating_score);
                            $sheet->setCellValue('E20', $appraisal2->appraisalRating->inno_rating_score);
                            $sheet->setCellValue('E21', $appraisal2->appraisalRating->comms_rating_score);
                            $sheet->setCellValue('E22', $appraisal2->appraisalRating->comp_rating_score);
                            $sheet->setCellValue('E23', $appraisal2->appraisalRating->attend_rating_score);
                        }
                    }
                $sheet->setCellValue('C24', $attendb_rating_score);
                $sheet->setCellValue('E24', $attendb_rating_score);

                } elseif ($level >= 10 && $level <= 11) {
                    $templatePath = storage_path('app/templates/PAMatrix_Sr.Manager.Executive.xlsx');

                    $appraisal1 = PerformanceAppraisal::find($finalGrade->appraisal1_id);
    
                    $spreadsheet = IOFactory::load($templatePath);

                    // Get the active sheet
                    $sheet = $spreadsheet->getActiveSheet();

                    // Insert data into specific cells
                    $sheet->setCellValue('B3', $appraisal1->period);
                    $sheet->setCellValue('B4', $appraisal1->name);
                    $sheet->setCellValue('B5', $appraisal1->company);
                    $sheet->setCellValue('B6', $appraisal1->group);
                    $sheet->setCellValue('B7', $appraisal1->designation);
                    $sheet->setCellValue('B8', $appraisal1->job_rank);

                    if($appraisal1 && $appraisal1->appraisalRating->form_id == 5) {
                        $sheet->setCellValue('C13', $appraisal1->appraisalRating->management_rating_score);
                        $sheet->setCellValue('C14', $appraisal1->appraisalRating->pm_rating_score);
                        $sheet->setCellValue('C15', $appraisal1->appraisalRating->ps_rating_score);
                        $sheet->setCellValue('C16', $appraisal1->appraisalRating->judgment_rating_score);
                        $sheet->setCellValue('C17', $appraisal1->appraisalRating->leadership_rating_score);
                        $sheet->setCellValue('C18', $appraisal1->appraisalRating->inno_rating_score);
                        $sheet->setCellValue('C19', $appraisal1->appraisalRating->comp_rating_score);
                    }
                }
                
                // Output the file to the browser
                $filename = 'final_grade_' . $current . $this->finalGradeId . '.xlsx';
                $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

                // Set headers for file download
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment; filename="' . $filename . '"');
                header('Cache-Control: max-age=0');

                // Write the file to the output
                $writer->save('php://output');
                exit; // Ensure no further output is sent
                },
        ];
    }
}
