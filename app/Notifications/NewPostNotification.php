<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\JobPost;

class NewPostNotification extends Notification
{
    use Queueable;
    protected $jobPost;

    /**
     * Create a new notification instance.
     */
    public function __construct(JobPost $jobPost)
    {
        $this->jobPost=$jobPost;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable)
    {
        return [
            'job_post_id' => $this->jobPost->id,
            'title' => $this->jobPost->title,
            'created_by' => $this->jobPost->user->name,

        ];
    }
}
