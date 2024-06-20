<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppraisalPeriod extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'appraisal_period';

	protected $fillable = [
		'id', 'name', 'created_at', 'updated_at', 'deleted_at'
	];
}
