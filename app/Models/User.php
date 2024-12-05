<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',

        'furigana',
        'profile_image',
        'date_of_birth',
        'gender',
        'address',
        'phone_number',
        'mobile_number',
        'education_year_1',
        'education_month_1',
        'education_school_1',
        'education_year_2',
        'education_month_2',
        'education_school_2',
        'education_year_3',
        'education_month_3',
        'education_school_3',
        'appear_point',
        'study_japan',
        'skill',
        'reason',
        'language',
        'license',
        'hobby',
        'part_time',
        'role',
        'check_approve',
        'admin_check_approve',

        //newly added
        'education_startEnd_1',
        'education_startEnd_2',
        'education_startEnd_3',

        'education_year_4',
        'education_month_4',
        'education_school_4',
        'education_startEnd_4',

        'education_year_5',
        'education_month_5',
        'education_school_5',
        'education_startEnd_5',

        'education_year_6',
        'education_month_6',
        'education_school_6',
        'education_startEnd_6',

        'education_year_7',
        'education_month_7',
        'education_school_7',
        'education_startEnd_7',

        'education_year_8',
        'education_month_8',
        'education_school_8',
        'education_startEnd_8',

        'education_year_9',
        'education_month_9',
        'education_school_9',
        'education_startEnd_9',

        'education_year_10',
        'education_month_10',
        'education_school_10',
        'education_startEnd_10',

        'education_year_11',
        'education_month_11',
        'education_school_11',
        'education_startEnd_11',

        'education_year_12',
        'education_month_12',
        'education_school_12',
        'education_startEnd_12',

        'education_year_13',
        'education_month_13',
        'education_school_13',
        'education_startEnd_13',

        'education_year_14',
        'education_month_14',
        'education_school_14',
        'education_startEnd_14',

        'education_year_15',
        'education_month_15',
        'education_school_15',
        'education_startEnd_15',



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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'date_of_birth'=>'date',
        ];
    }

    public function isJobseeker()
    {
        return $this->role==='jobseeker';
    }
    public function isCompany()
    {
        return $this->role==='company';
    }
    public function isAdmin()
    {
        return $this->role==='admin';
    }


    public function videoProfile()
{
    return $this->hasOne(VideoProfile::class);
}


public function companyProfile()
{
    return $this->hasOne(CompanyProfile::class);
}
public function jobPosts()
{
    return $this->hasMany(JobPost::class);
}


public function jobApplications()
{
    return $this->hasMany(JobApplication::class);
}



public function appliedJobs()
{
    return $this->belongsToMany(JobPost::class, 'job_applications');
}


public function messages()
{
    return $this->hasMany(Message::class, 'sender_id');
}


public function favoriteJobs()
{
    return $this->hasMany(JobFavorite::class);
}

public function unreadNotificationsCount()
{
    return $this->unreadNotifications()->count();
}

    // Check if user is an approved jobseeker
    public function isApprovedJobseeker()
    {
        return $this->role === 'jobseeker' && $this->admin_check_approve;
    }



}
