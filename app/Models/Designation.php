<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Designation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'designations';

	protected $fillable = [
		'name',
		'description',
	];

	public function users()
	{
	    return $this->hasMany(User::class);
	}

	public function scopeSearch($query, $search)
    {
        if (empty($search)) {
            return $query;
        }

        return $query->where(function ($query) use ($search) {
            $query->where('name', 'LIKE', "%$search%")
                  ->orWhere('description', 'LIKE', "%$search%");
        });
    }
}
