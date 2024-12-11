<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Request $request, JobPost $jobPost){
        if(!$jobPost->likedByUsers()->where('user_id', auth()->id())->exists()){
            $jobPost->likedByUsers()->attach(auth()->id());
        }


        return back()->with('success', '求人投稿をキープしました。');
    }

    public function unlike(Request $request, JobPost $jobPost)
    {
        if ($jobPost->likedByUsers()->where('user_id', auth()->id())->exists()) {
            $jobPost->likedByUsers()->detach(auth()->id());
        }

        return back()->with('success', '求人投稿のキープをはずしました。');
    }


    public function index()
    {
        $likedPosts=Auth::user()->likedJobPosts()->paginate(10);


        return view('liked.index', compact('likedPosts'));


    }
}
