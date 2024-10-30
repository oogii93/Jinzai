<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class TempPasswordNotification extends Notification
{
    private $tempPassword;

    public function __construct($tempPassword)
    {
        $this->tempPassword = $tempPassword;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your Temporary Password')
            ->line('Thank you for registering! Here is your temporary password:')
            ->line($this->tempPassword)
            ->line('Please use this password to log in. You will be prompted to change your password after your first login.')
            ->line('For security reasons, please change this password immediately after logging in.')
            ->action('Login Now', route('login'));
    }
}
