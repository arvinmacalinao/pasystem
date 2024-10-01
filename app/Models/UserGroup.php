<?php

namespace App\Models;

use File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserGroup extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_groups';

	protected $fillable = [
		'name',
		'alias',
		'description',
		'orgchart_file',
		'orgchart_filename',
	];
	
	public function users()
	{
	    return $this->hasMany(User::class);
	}

	public function orgchart()
	{
	    $filePath = 'storage/ugroup_docs/' . $this->orgchart_file;
	
	    if (file_exists(public_path($filePath))) {
	        return asset($filePath);
	    }
	
	    return null; // Return null if the file does not exist
	}

	public function companies()
{
    return $this->belongsToMany(Company::class, 'company_user_groups', 'ug_id', 'c_id');
}
}
