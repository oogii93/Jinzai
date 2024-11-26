<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications=auth()->user()->notifications()->paginate(10);

        return view('notifications.index', compact('notifications'));
    }

    public function markAsRead($id)
    {
        $notification=auth()->user()->notifications()->findOrFail($id);
        $notification->markAsRead();

        return back()->with('success', 'NOtification');
    }
}
