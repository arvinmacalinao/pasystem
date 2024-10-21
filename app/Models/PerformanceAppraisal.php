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
	protected $fillable = ['id', 'employee_id', 'evaluator_id', 'evaluation_date', 'period_id', 
    'evaluator_remarks', 'employee_remarks', 'period', 'name', 'company', 'group', 'designation', 
    'job_rank', 'created_at', 'updated_at', 'deleted_at', 'start_month', 'end_month', 'pa_file', 'pa_filename'];

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

    public function perfomance_appraisal_file()
	{
	    $filePath = 'storage/pa_support/' . $this->pa_file;
	
	    if (file_exists(public_path($filePath))) {
	        return asset($filePath);
	    }
	
	    return null; // Return null if the file does not exist
	}
}
