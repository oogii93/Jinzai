<?php

namespace App\Http\Controllers;

use App\Models\JobFavorite;
use Illuminate\Http\Request;

class JobFavoriteController extends Controller
{


    public function checkFavoriteStatus($jobId)
    {

        $user=auth()->user();

        $isFavorited=JobFavorite::where([
            'user_id'=>$user->id,
            'job_post_id'=>$jobId
        ])->exists();
        return response()->json([
            'isFavorited'=>$isFavorited
        ]);
    }
    public function toggleFavorite(Request $request, $jobId)
    {
        $user=auth()->user();

        $favorite=JobFavorite::where([
            'user_id'=>$user->id,
            'job_post_id'=>$jobId
        ])->first();

        if($favorite){
            $favorite->delete();
            $isFavorited=false;
        }else{
            JobFavorite::create([
                'user_id'=>$user->id,
                'job_post_id'=>$jobId
            ]);

            $isFavorited=true;
        }

        return response()->json([
            'success'=>true,
            'isFavorited'=>$isFavorited
        ]);

        //success message ywwuulaad
    }


    public function show()
    {

        $user = auth()->user();



        $favorites=JobFavorite::where('user_id',$user->id)
       ->latest()
        ->with('jobPost')
        ->paginate(10);
        return view('jobFavorite', compact('favorites'));
    }

    public function destroy($favoriteId)
    {
        $user=auth()->user();

        $favorite=JobFavorite::where('id', $favoriteId)
                    ->where('user_id', $user->id)
                    ->first();

            if($favorite){
                $favorite->delete();

                return response()->json([
                    'success'=>true,
                    'message'=>'お気に入りを削除しました'
                ]);
            }

            return response()->json([
                'success'=>true,
                'message'=>'Favorite not found'
            ],404);
    }
}
