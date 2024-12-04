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



    protected $jobApplication;

    /**
     * Create a new notification instance.
     */
    public function __construct(JobApplication $jobApplication)
    {
        $this->jobApplication=$jobApplication;
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

    /**
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase($notifiable)
    {
        $jobPost = $this->jobApplication->jobPost;


       return [
        'job_application_id' => $this->jobApplication->id,


        'message' => '新しい求人応募を受理しました'
    ];
    }

    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //         ->subject('New Job Application')
    //         ->line('A new job application has been submitted')
    //         ->action('View Application', route('admin.job-applications.show', $this->jobApplication->id));
    // }


}
