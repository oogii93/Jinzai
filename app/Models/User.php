<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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



}
