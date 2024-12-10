<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class JobApplication extends Model
{


    protected $casts = [
        'document_result_updated_at' => 'datetime',
        'web_interview_updated_at' => 'datetime',
        'taisei_interview' => 'datetime',
        'company_result_updated_at' => 'datetime',
        'work_start_updated_at' => 'datetime',
        'work_start' => 'date',
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
        'work_start',
        'company_result',
        'company_result_updated_by',
        'company_result_updated_at',
        'document_result_updated_by',
        'document_result_updated_at',
        'web_interview_updated_by',
        'web_interview_updated_at',
        'work_start_updated_by',
        'work_start_updated_at'





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

    public function documentResultUpdatedBy()
{
    return $this->belongsTo(User::class, 'document_result_updated_by');
}


public function webInterviewUpdatedBy()
{
    return $this->belongsTo(User::class, 'web_interview_updated_by');
}

public function companyResultUpdatedBy()
{
    return $this->belongsTo(User::class, 'company_result_updated_by');
}


public function workStartUpdatedBy()
{
    return $this->belongsTo(User::class, 'work_start_updated_by');
}


}
