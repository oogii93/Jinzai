<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Validation\Rule;

class CompanyDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Get job posts with their admin-approved applications
        $jobposts = JobPost::where('user_id', $user->id)
            ->with(['applications' => function($query) {
                $query->where('admin_status', 'approved')
                      ->with('user'); // Include applicant details
            }])
            ->withCount(['applications as pending_applications' => function($query) {
                $query->where('admin_status', 'approved')
                      ->where('company_status', 'pending');
            }])
            ->withCount(['applications as total_approved_applications' => function($query) {
                $query->where('admin_status', 'approved');
            }])
            ->get();

        // Get overall statistics
        $statistics = [
            'total_jobs' => $jobposts->count(),
            'total_applications' => $jobposts->sum('total_approved_applications'),
            'pending_reviews' => $jobposts->sum('pending_applications'),
        ];

        return view('company.dashboard', compact('user', 'jobposts', 'statistics'));
    }

    public function updateApplicationStatus(JobApplication $application, Request $request)
    {
        // Verify the application belongs to one of the company's job posts
        if ($application->jobPost->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Verify application is admin-approved
        if ($application->admin_status !== 'approved') {
            return back()->with('error', 'This application is not approved by admin.');
        }

        $request->validate([
            'status' => 'required|in:under_review,accepted,rejected'
        ]);

        $application->update([
            'company_status' => $request->status
        ]);

        return back()->with('success', 'Application status updated successfully.');
    }


    public function edit()
    {
        $user=Auth::user();

        if($user->role !== 'company'){
            abort(403, 'un');
        }

        $companyProfile=$user->companyProfile;

        return view('company.edit', compact('user', 'companyProfile'));

    }

    public function update(Request $request)
    {
        $user=Auth::user();

        if ($user->role !== 'company') {
            abort(403, 'Unauthorized access');
        }


        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id)
            ],
            'profile_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:20480'],
            'address' => ['nullable', 'string'],
            'phone_number' => ['nullable', 'string'],
            'mobile_number' => ['nullable', 'string'],
            // Company-specific fields
            // 'company_description' => ['required', 'string'],
            'industry' => ['required', 'string'],
            'website' => ['nullable', 'url'],
        ];

        $validatedDate=$request->validate($rules);

       // Handle profile image upload
       if ($request->hasFile('profile_image')) {
        // Delete old profile image if exists
        if ($user->profile_image) {
            try {
                Storage::disk('public')->delete($user->profile_image);
            } catch (\Exception $e) {
                // Log the error but continue with the update
                \Log::error('Failed to delete old profile image: ' . $e->getMessage());
            }
        }

        // Store new profile image
        $profileImagePath = $request->file('profile_image')->store('profile-image', 'public');
        $user->profile_image = $profileImagePath;
    }


        $user->fill([
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'phone_number'=>$request->phone_number,
            'mobile_number'=>$request->mobile_number,
        ])->save();


        $companyProfile=$user->companyProfile ?? $user->companyProfile()->create([]);
        $companyProfile->update([

            'company_description' => $request->company_description,
            'industry' => $request->industry,
            'website' => $request->website,

        ]);

        return redirect()->route('company.dashboard')
                ->with('success', 'プロファイルが正常に更新されました。');

    }






}
