<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\JobPost;

use Illuminate\Http\Request;
use App\Models\JobApplication;

class JobApplicationController extends Controller
{
    public function store(Request $request, JobPost $jobPost)
    {
        $request->validate([

        ]);

        // Handle file upload if resume is provided
        $resumePath = null;
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'public');
        }

        $application = JobApplication::create([
            'job_post_id' => $jobPost->id,
            'user_id' => auth()->id(),

        ]);

        return redirect()->back()->with('success', 'Application submitted successfully!');
    }

    public function index()
    {
        // For jobseekers to view their applications
        $applications = auth()->user()->jobApplications()->with('jobPost')->latest()->get();
        return view('applications.index', compact('applications'));
    }



    public function updateCompanyStatus(Request $request, JobApplication $application)
    {
        // Only allow the employer to update status
        if ($application->jobPost->user_id !== auth()->id()) {
            abort(403);
        }


        $request->validate([
            'company_status' => 'required|in:pending,under_review,accepted,rejected'
        ]);
        $application->update(['company_status' => $request->company_status]);

        return redirect()->back()->with('success', 'Application status updated!');
    }











    public function employerApplications(Request $request)
    {
        $authUser = auth()->user(); // Get the authenticated user

        $jobpost = JobPost::with(['category', 'user']) // Add user to eager loading
            ->where('user_id', $authUser->id) // Only fetch job posts created by the authenticated user
            ->latest()
            ->get();

        $status = $request->get('status', 'pending');

        $users = User::where('role', 'jobseeker')
            ->with('videoProfile')
            ->get();

        $company = User::where('role', 'company')->get();

        $applications = JobApplication::with([
                'jobPost',
                'user'
            ])
            ->whereHas('jobPost', function ($query) use ($authUser) {
                $query->where('user_id', $authUser->id); // Only applications for the authenticated user's job posts
            })
            ->when($status !== 'all', function ($query) use ($status) {
                return $query->where('admin_status', $status);
            })
            ->latest()
            ->paginate();

        $counts = [
            'pending' => JobApplication::whereHas('jobPost', function ($query) use ($authUser) {
                $query->where('user_id', $authUser->id); // Count only applications for this user's job posts
            })->where('admin_status', 'pending')->count(),
            'approved' => JobApplication::whereHas('jobPost', function ($query) use ($authUser) {
                $query->where('user_id', $authUser->id); // Count only applications for this user's job posts
            })->where('admin_status', 'approved')->count(),
            'rejected' => JobApplication::whereHas('jobPost', function ($query) use ($authUser) {
                $query->where('user_id', $authUser->id); // Count only applications for this user's job posts
            })->where('admin_status', 'rejected')->count(),
        ];

        return view('company.employer', compact('applications', 'counts', 'status', 'users', 'company', 'jobpost'));
    }



}
