<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\JobPost;
use Illuminate\Notifications\Messages\DatabaseMessage;

class CompanyNotificationForJobPostApproval extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

     protected $jobPost;

    public function __construct(JobPost $jobPost)
    {
        $this->jobPost=$jobPost;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable)
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
    public function toDatabase(object $notifiable):DatabaseMessage
    {

        $message=$this->jobPost->status === '承認'
                                    ? '管理者があなたが作成した投稿承認しました。求人投稿がいま公開中です。'
                                    : '管理者があなたが作成した投稿を拒否しました。';

        return new DatabaseMessage([
        'message'=>$message,
        'job_post_id' => $this->jobPost->id,
        'job_post_title' => $this->jobPost->title,
        'status' => $this->jobPost->status ?? '不明'
        ]);
    }
}
