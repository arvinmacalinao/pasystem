<?php

namespace App\Models;

use App\Models\User;
use App\Models\Company;
use App\Models\UserGroup;
use App\Models\Designation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeOffense extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'employee_offences';
	protected $fillable = ['id', 'employee_id', 'c_id', 'ug_id', 'd_id', 'employee_name', 'company', 
    'department', 'position', 'date_committed', 'type_of_offense', 'policy_violated', 
    'penalty', 'decision_of_case', 'eo_file', 'eo_filename', 'created_at', 'updated_at', 'deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'employee_id'); 
    }

    public function group()
    {
        return $this->belongsTo(UserGroup::class, 'ug_id', 'id');
    }
    
    public function company()
    {
        return $this->belongsTo(Company::class, 'c_id', 'id');
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'd_id', 'id');
    }

    public function eo_file()
	{
	    $filePath = 'storage/eo_docs/' . $this->orgchart_file;
	
	    if (file_exists(public_path($filePath))) {
	        return asset($filePath);
	    }
	
	    return null; // Return null if the file does not exist
	}
}
