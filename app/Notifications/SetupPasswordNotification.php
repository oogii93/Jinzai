<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SetupPasswordNotification extends Notification
{
    use Queueable;


    protected $url;


    /**
     * Create a new notification instance.
     */
    public function __construct($url)
    {

        $this->url=$url;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {

        return (new MailMessage)
        ->subject('Set Up Your Password')
        ->line('Thank you for registering! Please click the button below to set up your password.')
        ->action('Set Password', $this->url)
        ->line('This password setup link will expire in 24 hours.')
        ->line('If you did not create an account, no further action is required.');
    }




    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
