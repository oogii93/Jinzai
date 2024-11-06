<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable=[
        'job_post_id',
        'user_id',
        'admin_status',
        'company_status',
        'admin_remarks',
        'cover_letter',
        'resume_path'
    ];

    public function jobPost()
    {
        return $this->belongsTo(JobPost::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isVisibleToCompany()
    {
        return $this->admin_status === 'approved';
    }
}
