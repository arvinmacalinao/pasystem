<?php

namespace App\Models;

use App\Models\User;
use App\Models\ActualAttendance;
use App\Models\PerformanceAppraisal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FinalGrade extends Model
{
    protected $fillable = [
        'employee_id',
        'appraisal1_id',
        'appraisal2_id',
        'attendance_id',
        'period_id',
        'year',
        'appraisal1_score',
        'appraisal2_score',
        'attendance_score',
        'final_score',
    ];

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function appraisal1()
    {
        return $this->belongsTo(PerformanceAppraisal::class, 'appraisal1_id', 'id');
    }

    public function appraisal2()
    {
        return $this->belongsTo(PerformanceAppraisal::class, 'appraisal2_id', 'id');
    }

    public function attendance()
    {
        return $this->belongsTo(ActualAttendance::class, 'attendance_id');
    }
}
