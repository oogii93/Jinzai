<?php

namespace App\Http\Controllers;

use App\Models\JobFavorite;
use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class JobFavoriteController extends Controller
{


    public function checkFavoriteStatus($jobId)
    {
        // Explicit checks
        if (!Auth::check()) {
            return response()->json([
                'error' => 'Unauthorized',
                'message' => 'You must be logged in'
            ], 401);
        }

        try {
            $isFavorited = JobFavorite::where([
                'user_id' =>Auth::id(),
                'job_post_id' => $jobId
            ])->exists();

            return response()->json([
                'isFavorited' => $isFavorited
            ]);

        } catch (\Exception $e) {
            \Log::error('Favorite Check Error: ' . $e->getMessage());

            return response()->json([
                'error' => 'Internal Server Error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function toggleFavorite(Request $request, $jobId)
    {
        // Validate the job post exists
        $jobPost = JobPost::findOrFail($jobId);

        $user = Auth::user();

        $favorite = JobFavorite::where([
            'user_id' => $user->id,
            'job_post_id' => $jobId
        ])->first();

        try {
            if ($favorite) {
                $favorite->delete();
                $isFavorited = false;
                $message = 'お気に入りを解除しました';
            } else {
                JobFavorite::create([
                    'user_id' => $user->id,
                    'job_post_id' => $jobId
                ]);
                $isFavorited = true;
                $message = 'お気に入りに追加しました';
            }

            return response()->json([
                'success' => true,
                'isFavorited' => $isFavorited,
                'message' => $message
            ]);
        } catch (\Exception $e) {
            Log::error('Favorite Toggle Error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'error' => 'Internal Server Error',
                'message' => 'お気に入りの操作中にエラーが発生しました'
            ], 500);
        }
    }


    public function show()
    {

        $user = Auth::user();



        $favorites=JobFavorite::where('user_id',$user->id)
       ->latest()
        ->with('jobPost')
        ->paginate(10);
        return view('jobFavorite', compact('favorites'));
    }

    public function destroy($favoriteId)
    {
        $user = Auth::user();

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
