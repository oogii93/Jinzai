<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;

class NewUserRegisterNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

     protected $user;

     protected $userRole;

    public function __construct(User $user, string $userRole)
    {
        $this->user=$user;
        $this->userRole=$userRole;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        // return ['mail'];
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
    public function toDatabase (object $notifiable): DatabaseMessage
    {
        return new DatabaseMessage([
            'user_id'=>$this->user->id,
            'name'=>$this->user->name,
            'email'=>$this->user->email,
            'user_role'=>$this->userRole,
           'message' => "新規 {$this->userRole} が登録しました　: {$this->user->name}"
        ]);
    }
}
