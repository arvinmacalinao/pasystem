<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobLevel extends Model
{
    use HasFactory;

    protected $table = 'job_level';

	protected $fillable = [
		'name',
	];

	public function users()
	{
	    return $this->hasMany(User::class);
	}
}
