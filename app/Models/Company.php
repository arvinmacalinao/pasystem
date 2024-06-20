<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'company';

	protected $fillable = [
		'name',
		'alias',
	];

	public function users()
	{
	    return $this->hasMany(User::class, 'c_id');
	}

	public function ratings()
    {
        return $this->hasMany(PerformanceAppraisal::class);
    }
}
