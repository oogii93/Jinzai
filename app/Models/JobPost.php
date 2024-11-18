<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{

    protected $table='job_post';


    protected $fillable=[

        'title',
        'salary',
        'working_hour',
        'working_location',
        'job_detail',
        'qualification',
        'other',
        'user_id',
        'category_id',


        'company_name',
        'company_furigana',
        'company_address',
        'home_url',
        'type',
        'my_car',
        'trial_period',
        'overtime',
        'other_allowance',
        'salary_increase_option',
        'salary_increase_from',
        'salary_increase_to',
        'bonus_increase_option',
        'bonus_increase_from',
        'bonus_increase_to',

        'overtime_hour',
        'break',
        'holidays',
        'insurance',
        'fire_option',
        'house_option',
        'childcare_option'

    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'job_post_tag', 'job_post_id', 'tag_id');
    }

    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }
    public function company()
{
    return $this->belongsTo(User::class, 'company_id');
}
}
