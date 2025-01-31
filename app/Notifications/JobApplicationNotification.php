<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use App\Models\JobApplication;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;


class JobApplicationNotification extends Notification
{
    use Queueable;



    protected $application;

    /**
     * Create a new notification instance.
     */
    public function __construct(JobApplication $application)
    {
        $this->application=$application->load(['jobPost','user']);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['database']; // Start with just database
    }

    public function toDatabase($notifiable)
    {

        // $user = User::find($this->application->user_id);

        $jobPost=$this->application->jobPost;
        return [
            'type'=>'job_application',
            'title'=>$this->application->jobPost->title,
            'company_name'=>$this->application->jobPost->company_name,
            'applicant_name'=>$this->application->user->name,
        //    'created_at'=>$this->application->created_at->format('Y-m-d H:i'),
        'created_at'=>now()->toDateTimeString()





        ];
    }



}
