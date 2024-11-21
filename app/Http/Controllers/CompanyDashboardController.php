<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;

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






}
