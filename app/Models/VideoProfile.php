<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoProfile extends Model
{
    protected $fillable = [
        'user_id',
        'video_path',
        'title',
        'description',
        'duration'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
