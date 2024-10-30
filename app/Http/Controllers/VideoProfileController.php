<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoProfile;
use Illuminate\Support\Facades\Storage;
use getID3;

class VideoProfileController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'video' => 'required|mimetypes:video/mp4,video/quicktime|max:102400', // 100MB max
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string'
        ]);

        try {
            // Get video duration
            $getID3 = new getID3;
            $file = $getID3->analyze($request->file('video'));
            $duration = ceil($file['playtime_seconds']);

            // Check if duration is within 5 minutes
            if ($duration > 300) { // 300 seconds = 5 minutes
                return back()->withErrors(['video' => 'Video must not exceed 5 minutes']);
            }

            // Store the video
            $path = $request->file('video')->store('video-profiles', 'public');

            // Create or update video profile
            $videoProfile = VideoProfile::updateOrCreate(
                ['user_id' => auth()->id()],
                [
                    'video_path' => $path,
                    'title' => $request->title,
                    'description' => $request->description,
                    'duration' => $duration
                ]
            );

            return back()->with('success', 'Video profile updated successfully');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to upload video: ' . $e->getMessage()]);
        }
    }

    public function destroy()
    {
        $videoProfile = auth()->user()->videoProfile;

        if ($videoProfile) {
            Storage::disk('public')->delete($videoProfile->video_path);
            $videoProfile->delete();
        }

        return back()->with('success', 'Video profile removed successfully');
    }
}
