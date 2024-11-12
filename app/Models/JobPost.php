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
        'category_id'
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
