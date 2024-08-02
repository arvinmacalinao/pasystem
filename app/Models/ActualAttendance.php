<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActualAttendance extends Model
{
    use HasFactory;
    
    protected $table = 'actual_attendance';

    protected $fillable = ['id', 'employee_id', 'encoder_id', 'period_id', 'late_rating_1', 'late_rating_2', 
    'late_rating_3', 'late_rating_4', 'late_rating_5', 'late_rating_6', 'da_records_late_1', 'da_records_late_2', 
    'da_records_late_3', 'da_records_late_4', 'da_records_late_5', 'da_records_late_6', 'late_rating_score', 
    'ut_rating_1', 'ut_rating_2', 'ut_rating_3', 'ut_rating_4', 'ut_rating_5', 'ut_rating_6', 'da_records_ut_1', 
    'da_records_ut_2', 'da_records_ut_3', 'da_records_ut_4', 'da_records_ut_5', 'da_records_ut_6', 'ut_rating_score', 
    'ul_rating_1', 'ul_rating_2', 'ul_rating_3', 'ul_rating_4', 'ul_rating_5', 'ul_rating_6', 'da_records_ul_1', 
    'da_records_ul_2', 'da_records_ul_3', 'da_records_ul_4', 'da_records_ul_5', 'da_records_ul_6', 'ul_rating_score', 
    'attend_b_rating_score', 'created_at', 'updated_at', 'late_start_month', 'ut_start_month', 'ul_start_month'];

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function encoder()
    {
        return $this->belongsTo(User::class, 'encoder_id');
    }
}
