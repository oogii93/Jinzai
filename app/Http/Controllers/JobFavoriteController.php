<?php

namespace App\Http\Controllers;

use App\Models\JobFavorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobFavoriteController extends Controller
{


    public function toggle($jobId)
    {
        if(!Auth::check()){
            return response()->json(['error'=>'Unauthorized'], 401);
        }

        $user=Auth::user();

        $existing=JobFavorite::where('user_id', $user->id)
                            ->where('job_post_id', $jobId)
                            ->first();


                            if($existing)
                            {
                                $existing->delete();
                                $isFavorited=false;
                            }else{
                                JobFavorite::create([
                                    'user_id'=>$user->id,
                                    'job_post_id'=>$jobId
                                ]);

                                $isFavorited=true;
                            }

                        return response()->json([
                            'isFavorited'=>$isFavorited
                        ]);
    }

    public function show()
    {

        $user=Auth::user();



        $favorites=JobFavorite::where('user_id',$user->id)
       ->latest()
        ->with('jobPost')
        ->paginate(10);
        return view('jobFavorite', compact('favorites'));
    }

    public function destroy($favoriteId)
    {
        $user=Auth::user();

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
