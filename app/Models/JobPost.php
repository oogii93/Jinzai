<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{

    protected $table='job_post';


    protected $fillable=[


        'salary',
        // 'working_hour',
        'working_location',
        'job_detail',
        'qualification',
        'other',
        'user_id',
        'category_id',


        'company_name',
        'company_furigana',
        'company_address',
        'homepage_url',
        'type',
        'my_car',
        'trial_period',

        'overtime_hour',
        'break',
        'holidays',
        'insurance',
        'fire_option',
        'house_option',
        'childcare_option',
        'status',
        'category2_id',

        'title',
        'working_hour',
        'working_hour_a',
        'working_hour_b_1',
        'working_hour_b_2',
        'working_hour_b_3',
        'holiday_type',
        'salary_deadline',
        'salary_payment_month',
        'salary_payment_day',
        'smoke_option',
        //
        'image_1',
        'image_2',



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


    public function category2()
    {
        return $this->belongsTo(Category2::class, 'category2_id');
    }

    public function likedByUsers()
{
    return $this->belongsToMany(User::class, 'likes')->withTimestamps();
}
}
