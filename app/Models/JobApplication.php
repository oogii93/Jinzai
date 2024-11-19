<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class JobApplication extends Model
{

    protected $cast=[
        'taisei_interview'=>'datetime'
    ];
    protected $fillable=[
        'job_post_id',
        'user_id',
        'admin_status',
        'company_status',

        'taisei_interview',
        'taisei_result',
        'document_result',
        'web_interview',
        'work_start'

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
