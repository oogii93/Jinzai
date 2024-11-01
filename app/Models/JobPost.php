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
        return $this->belongsToMany(Tag::class);
    }
}
