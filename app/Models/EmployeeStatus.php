<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeStatus extends Model
{
    use HasFactory;

    protected $table = 'employment_status';

	protected $fillable = [
		'name',
	];

	public function users()
	{
	    return $this->hasMany(User::class);
	}
}
