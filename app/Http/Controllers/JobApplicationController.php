<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\JobPost;

use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function store(Request $request, JobPost $jobPost)
    {
        $request->validate([
            'cover_letter' => 'nullable|string',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);

        // Handle file upload if resume is provided
        $resumePath = null;
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'public');
        }

        $application = JobApplication::create([
            'job_post_id' => $jobPost->id,
            'user_id' => auth()->id(),
            'cover_letter' => $request->cover_letter,
            'resume_path' => $resumePath
        ]);

        return redirect()->back()->with('success', 'Application submitted successfully!');
    }

    public function index()
    {
        // For jobseekers to view their applications
        $applications = auth()->user()->jobApplications()->with('jobPost')->latest()->get();
        return view('applications.index', compact('applications'));
    }

    public function employerApplications()
    {



        // For employers to view applications to their job posts
        $applications = JobApplication::whereHas('jobPost', function ($query) {
            $query->where('user_id', auth()->id());
        })

        ->where('admin_status', 'approved')
        ->with(['jobPost', 'user'])
        ->latest()
        ->get();

        return view('applications.employer-index', compact('applications'));
    }

    public function updateCompanyStatus(Request $request, JobApplication $application)
    {
        // Only allow the employer to update status
        if ($application->jobPost->user_id !== auth()->id()) {
            abort(403);
        }

        if($application->admin_status !== 'approved'){
            abort(403, 'This application is not yet approved by admin');
        }

        $request->validate([
            'company_status' => 'required|in:pending,under_review,accepted,rejected'
        ]);
        $application->update(['company_status' => $request->company_status]);

        return redirect()->back()->with('success', 'Application status updated!');
    }
}
