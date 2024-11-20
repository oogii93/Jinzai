<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category2 extends Model
{


    protected $table='categories2';

    protected $fillable=[
        'name',
        'category_id'
    ];

    public function mainCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function jobPost()
    {
        return $this->hasMany(JobPost::class, 'category2_id');
    }
}
