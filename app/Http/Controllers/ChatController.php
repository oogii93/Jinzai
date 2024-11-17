<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class ChatController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        if ($user->role === 'admin') {
            $users = User::where('role', '!=', 'admin')->get();
        } else {
            $users = User::where('role', 'admin')->get();
        }



        $conversations = Message::where('sender_id', $user->id)
            ->orWhere('receiver_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy(function ($message) use ($user) {
                return $message->sender_id === $user->id
                    ? $message->receiver_id
                    : $message->sender_id;
            });


        return view('chat.index', compact('conversations', 'users'));
    }



    public function show(User $otherUser)
    {
        $user = Auth::user();




      if(!$this->canChat($user, $otherUser)){
        return redirect()->route('chat.index')
        ->with('error','you can only chat with admin');
      }



        $messages = Message::where(function ($query) use ($user, $otherUser) {
            $query->where('sender_id', $user->id)
                ->where('receiver_id', $otherUser->id);
        })->orWhere(function ($query) use ($user, $otherUser) {
            $query->where('sender_id', $otherUser->id)
                ->where('receiver_id', $user->id);
        })->orderBy('created_at', 'asc')
            ->get();

        return view('chat.show', compact('messages', 'otherUser'));
    }

    public function store(Request $request, User $receiver)
    {


        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $user=Auth::user();

        if (!$this->canChat($user, $receiver)) {
            return response()->json([
                'error' => 'You can only chat with admin users.'
            ], 403);
        }
        try{

            $message=Message::create([
                'sender_id'=>$user->id,
                'receiver_id'=>$receiver->id,
                'content'=>$request->content,
            ]);






            return response()->json([
                'id'=>$message->id,
                'content'=>$message->content,
              'created_at' => $message->created_at->timezone('Asia/Tokyo')->format('Y年m月d日 H:i'),
                'sender_id'=>$message->sender_id
            ]);

        }catch(\Exception $e){

            return response()->json([
                'error' => 'Failed to save message'
            ], 500);
        }


    }

    private function canChat(User $user1, User $user2): bool
    {
        return $user1->role === 'admin' || $user2->role === 'admin';
    }
}
