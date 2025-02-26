<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()->notifications()->paginate(15);
        // dd($notifications);

        return view('notifications.index', compact('notifications'));
    }

    public function markAsRead($id)
    {
        // Use DatabaseNotification to ensure we can mark any type of notification
        // $notification = DatabaseNotification::findOrFail($id);
        $notification = auth()->user()->notifications()->findOrFail($id);

        $notification->markAsRead();

            // Check if the notification belongs to the authenticated user
            if ($notification->notifiable_id !== auth()->id() ||
            $notification->notifiable_type !== get_class(auth()->user())) {
            abort(403, 'Unauthorized action.');
        }

        if(isset($notification->data['type']) && $notification->data['type'] ==='job_application'){
            return redirect()->route('admin.applications.index');
        }

        if(isset($notification->data['type']) && $notification->data['type']==='jobPost_created'){
            return redirect()->route('jobpost.show',['id'=>$notification->data['job_post_id']]);
        }
        if(isset($notification->data['type'] ) && $notification->data['type']==='jobPostNotification_forAdmin'){
            // return redirect()->route('jobpost.show',$id); ene ajilaagui ni

            return redirect()->route('jobpost.show', ['id'=>$notification->data['job_post_id']]);
        }
        if(isset($notification->data['type'] ) && $notification->data['type']==='ChatNotification'){
            return redirect()->route('chat.show', ['id'=>$notification->data['message_id']]);
        }








        return back()->with('success', 'Notification marked as read');
    }



    // public function markAllAsRead()
    // {
    //     auth()->user()->unreadNotifications->markAsRead();

    //     return back()->with('success', 'All notifications marked as read');
    // }
}
