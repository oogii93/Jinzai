<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\Models\Message;
use App\Models\User;
use PharIo\Manifest\Url;

class NewChatNotification extends Notification
{
    use Queueable;

    protected $message;
    protected $sender;

    /**
     * Create a new notification instance.
     */
    public function __construct(Message $message, User $sender)
    {
        $this->message=$message;
        $this->sender=$sender;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('新しいメッセージが届きました')
                    ->greeting($notifiable->name . ' 様')
                    ->line($this->sender->name . 'からメッセージが届きました。')
                    ->line('メッセージ内容: ' . substr($this->message->content, 0, 100) .
                          (strlen($this->message->content) > 100 ? '...' : ''))
                          ->action('メッセージを確認する', 'https://xs696840.xsrv.jp/Jinzai/public/login')
                    ->line('システムに入ってチャトのところを見てください。');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'type'=>'ChatNotification',
            'message_id' => $this->message->id,
            'sender_id' => $this->sender->id,
            'sender_name' => $this->sender->name,
            'content' => substr($this->message->content, 0, 100) .
                        (strlen($this->message->content) > 100 ? '...' : ''),
            'created_at' => $this->message->created_at->timezone('Asia/Tokyo')->format('Y年m月d日 H:i')
        ];
    }
}
