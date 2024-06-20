<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'roles';

	protected $fillable = [
		'name',
		'description',
	];

	public function users()
	{
	    return $this->hasMany(User::class);
	}
}
