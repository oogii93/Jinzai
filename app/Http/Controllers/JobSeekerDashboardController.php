<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Models\JobPost;

class JobSeekerDashboardController extends Controller
{
    public function dashboard()
    {


        return view('jobseeker.dashboard');
    }

    public function history()
    {
        // For jobseekers to view their applications
        $applications = auth()->user()->jobApplications()->with('jobPost')->latest()->get();

        // dd($applications);
        return view('jobseeker.history', compact('applications'));
    }
}
