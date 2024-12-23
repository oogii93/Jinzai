<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name'];



    public function jobPosts()  // Changed from jobPosts() to posts()
    {
        return $this->hasMany(JobPost::class);
    }

    public function subcategories()
    {
        return $this->hasMany(Category2::class, 'category_id');
    }




}
