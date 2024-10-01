<?php

namespace App\Models;

use App\Models\User;
use App\Models\UserGroup;
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
		'orgchart_file',
		'orgchart_filename',
	];

	public function users()
	{
	    return $this->hasMany(User::class, 'c_id');
	}

	public function ratings()
    {
        return $this->hasMany(PerformanceAppraisal::class);
    }

	public function c_orgchart()
	{
	    $filePath = 'storage/company_docs/' . $this->orgchart_file;
	
	    if (file_exists(public_path($filePath))) {
	        return asset($filePath);
	    }
	
	    return null; // Return null if the file does not exist
	}

	public function userGroups()
	{
	    return $this->belongsToMany(UserGroup::class, 'company_user_groups', 'c_id', 'ug_id');
	}
}
