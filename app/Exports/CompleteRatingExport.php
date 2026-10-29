<?php

namespace App\Exports;

use App\Models\User;
use App\Models\FinalGrade;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CompleteRatingExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $search, $comp, $level, $ug, $year, $period, $status;

    public function __construct($search, $comp, $level, $ug, $year, $period, $status)
    {
        logger(compact('period', 'year'));
        $this->search = $search;
        $this->comp = $comp;
        $this->level = $level;
        $this->ug = $ug;
        $this->year = $year;
        $this->period = $period;
        $this->status = $status;
    }
 
    public function collection()
{
    return FinalGrade::where('final_grade', 1)
        ->when($this->year, function ($query) {
            $query->where('year', $this->year);
        })
        ->when($this->period, function ($query) {
            $query->where('period_id', $this->period);
        })
        ->whereHas('employee', function ($query) {
            $query->UserSearch($this->search)
                  ->SearchCompany($this->comp)
                  ->SearchLevel($this->level)
                  ->SearchUsergroup($this->ug)
                  ->SearchStatus($this->status);
        })
        ->with([
            'employee.company',
            'employee.group',
            'employee.designation',
            'employee.joblevel',
            'employee.status',
            'appraisal1.appraisalRating',
            'appraisal2.appraisalRating'
        ])
        ->get()
        ->map(function ($grade) {
            $employee = $grade->employee;

            return [
                'Employee ID'   => $employee->employee_code,
                'Employee Name' => $employee->FullName,
                'Company'       => optional($employee->company)->name,
                'Department'    => optional($employee->group)->name,
                'Position'      => optional($employee->designation)->name,
                'Job Level'     => optional($employee->joblevel)->name,
                'Status'        => optional($employee->status)->name,
                'Period'        => $grade->period_id ?? 'N/A',
                'Appraisal1'    => optional($grade->appraisal1->appraisalRating)->evaluator_recommendation ?? 'N/A',
                'Appraisal2'    => optional(optional($grade->appraisal2)->appraisalRating)->evaluator_recommendation ?? 'N/A',
                'Final Grade'   => $grade->final_score ?? 'N/A',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Employee ID',
            'Employee Name',
            'Company',
            'Department',
            'Position',
            'Job Level',
            'Status',
            'Period',
            'Immediate Supervisor Recommendation',
            'Final Rater Recommendation',
            'Final Grade',
        ];
    }
}
