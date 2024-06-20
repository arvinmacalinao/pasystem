<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PerformanceAppraisal extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'performance_appraisals';
	protected $fillable = [
		'id', 'employee_id', 'evaluator_id', 'evaluation_date', 'period_id', 'evaluator_remarks', 
		'employee_remarks', 'created_at', 'updated_at', 'deleted_at'
	];

	public function user()
    {
        return $this->belongsTo(User::class, 'employee_id'); // Ensure this matches your database structure
    }

    public function evaluator()
    {
        return $this->belongsTo(User::class, 'evaluator_id'); // Ensure this matches your database structure
    }

    public function appraisalRating()
    {
        return $this->hasOne(AppraisalRating::class, 'appraisal_id');
    }
}
