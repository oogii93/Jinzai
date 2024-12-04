<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Notification;
class JobSeekerApprovalStatusNotification extends Notification
{
    use Queueable;

    protected $approvalStatus;

    protected $adminName;

    /**
     * Create a new notification instance.
     */
    public function __construct($approvalStatus, $adminName)
    {
        $this->approvalStatus=$approvalStatus;
        $this->adminName=$adminName;
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
    $message=$this->approvalStatus

        ? '求職者アカウントが管理者' .$this->adminName. 'により承認されました。'
        : '求職者アカウントが管理者' .$this->adminName. 'により不承認とされました。';


        return [
            'message'=>$message,
            'admin_name'=>$this->adminName,
            'approval_status'=>$this->approvalStatus
        ];
  }
}
