<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use App\Models\User;
use App\Models\Company;
use App\Models\JobLevel;
use App\Models\UserGroup;
use App\Models\FinalGrade;
use App\Models\Designation;
use App\Models\EmployeeStatus;
use App\Models\ActualAttendance;
use Laravel\Sanctum\HasApiTokens;
use App\Models\PerformanceAppraisal;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id', 'first_name', 'middle_name', 'last_name', 'email', 'username', 'password', 'employee_code', 
        'date_hired',  'date_regular', 'date_separated', 'location', 'es_id', 'is_id', 'fr_id', 'job_level', 
        'ug_id', 'r_id', 'c_id', 'd_id', 'u_enabled', 'u_active', 
        'remember_token', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getFullNameAttribute($value) {		
		return ucfirst($this->first_name).' '.ucfirst(substr($this->middle_name, 0, 1)).'. '.ucfirst($this->last_name);
	}

    public function group()
    {
        return $this->belongsTo(UserGroup::class, 'ug_id', 'id');
    }

    public function joblevel()
    {
        return $this->belongsTo(JobLevel::class, 'job_level', 'id');
    }
    
    public function role()
    {
        return $this->belongsTo(Role::class, 'r_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'c_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(EmployeeStatus::class, 'es_id', 'id');
    }

    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'is_id');
    }

    public function subordinatesasIS(): HasMany
    {
        return $this->hasMany(User::class, 'is_id');
    }
    public function subordinatesasFR(): HasMany
    {
        return $this->hasMany(User::class, 'fr_id');
    }
    
    public function performanceAppraisals()
    {
        return $this->hasMany(PerformanceAppraisal::class, 'employee_id', 'id');
    }

    public function actual_attendance()
    {
        return $this->hasMany(ActualAttendance::class, 'employee_id');
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'd_id', 'id');
    }

    public function final_grade()
    {
        return $this->hasMany(FinalGrade::class, 'employee_id');
    }

    public function scopeUserSearch($query, $search)
    {
        if (empty($search)) {
            return $query;
        }

        return $query->where(function ($query) use ($search) {
            $query->where('last_name', 'LIKE', "%$search%")
                  ->orWhere('first_name', 'LIKE', "%$search%")
                  ->orWhere('middle_name', 'LIKE', "%$search%");
        });
    }

    public function scopeSearchUsergroup($query, $ug)
    {
        if($ug){
            $query->where('ug_id', $ug);
        }
        return $query;
    }

    public function scopeSearchCompany($query, $comp)
    {
        if (empty($comp)) {
            return $query;
        }

        return $query->where('c_id', $comp);
    }

    public function scopeSearchLevel($query, $level)
    {
        if (empty($level)) {
            return $query;
        }

        return $query->where('job_level', $level);
    }
}
