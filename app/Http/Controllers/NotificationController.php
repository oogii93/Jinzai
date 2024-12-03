<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()->notifications()->paginate(10);
        // dd($notifications);

        return view('notifications.index', compact('notifications'));
    }

    public function markAsRead($id)
    {
        // Use DatabaseNotification to ensure we can mark any type of notification
        $notification = DatabaseNotification::findOrFail($id);

        // Check if the notification belongs to the authenticated user
        if ($notification->notifiable_id !== auth()->id() ||
            $notification->notifiable_type !== get_class(auth()->user())) {
            abort(403, 'Unauthorized action.');
        }

        $notification->markAsRead();

        return back()->with('success', 'Notification marked as read');
    }

    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();

        return back()->with('success', 'All notifications marked as read');
    }
}
