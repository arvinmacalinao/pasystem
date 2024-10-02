<?php

namespace App\Models;

use App\Models\Company;
use App\Models\UserGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyUserGroup extends Model
{
    use HasFactory;

    protected $table = 'company_user_groups_orgchart';

    protected $fillable = ['c_id', 'ug_id', 'orgchart_file', 'orgchart_filename', 'created_at', 'updated_at'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'c_id');
    }

    public function usergroups()
    {
        return $this->belongsTo(UserGroup::class, 'ug_id');
    }

    public function orgchart()
	{
	    $filePath = 'storage/ugroup_docs/' . $this->orgchart_file;
	
	    if (file_exists(public_path($filePath))) {
	        return asset($filePath);
	    }
	
	    return null; // Return null if the file does not exist
	}
}
