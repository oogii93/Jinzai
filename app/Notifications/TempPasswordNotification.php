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
            ->subject('仮パスワード')
            ->line('ご登録ありがとうございます。こちらがあなたの仮パスワードです:')
            ->line($this->tempPassword)
            ->line('このパスワードを使用してログインしてください。最初のログイン後にパスワードを変更するように求められます。')
            ->line('パスワードを変更するにはマイページに入って新しいパスワード作成してください。')

            ->line('セキュリティ上の理由から、ログイン後すぐにこのパスワードを変更してください。')
            ->action('ログイン', route('login'));
    }
}
