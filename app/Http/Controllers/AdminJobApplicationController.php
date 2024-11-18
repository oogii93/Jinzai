<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\JobPost;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ApplicationApproved;
use App\Notifications\ApplicationRejected;

class AdminJobApplicationController extends Controller
{


    public function index(Request $request)
    {


        $jobpost = JobPost::with(['category', 'user'])  // Add user to eager loading
        ->latest()
        ->get();


        $status=$request->get('status', 'pending');

        $users=User::where('role', 'jobseeker')
        ->with('videoProfile')
        ->get();

        $company=User::where('role', 'company')
        ->get();

        $applications=JobApplication::with([
            'jobPost',
            'user'
        ])
        ->when($status !=='all', function($query) use($status){
            return $query->where('admin_status', $status);
        })
        ->latest()
        ->paginate();

        $counts = [
            'pending' => JobApplication::where('admin_status', 'pending')->count(),
            'approved' => JobApplication::where('admin_status', 'approved')->count(),
            'rejected' => JobApplication::where('admin_status', 'rejected')->count(),
        ];
        // dd([
        //     'adfadsf'=>$company
        // ]);

        return view('admin.applications.index', compact('applications', 'counts', 'status','users','company','jobpost'));
    }

    public function review(Request $request, JobApplication $application)
    {
        $request->validate([
            'admin_status' => 'required|in:approved,rejected',
            'admin_remarks' => 'nullable|string'
        ]);

        $application->update([
            'admin_status' => $request->admin_status,
            'admin_remarks' => $request->admin_remarks
        ]);

        // Notify relevant parties
        // if ($request->admin_status === 'approved') {
        //     $application->jobPost->user->notify(new ApplicationApproved($application));
        // } else {
        //     $application->user->notify(new ApplicationRejected($application));
        // }

        return redirect()->back()->with('success', 'Application review completed!');
    }

    public function showReviewed()
    {
        $applications = JobApplication::whereIn('admin_status', ['approved', 'rejected'])
            ->with(['jobPost', 'user'])
            ->latest()
            ->paginate(20);

        return view('admin.applications.reviewed', compact('applications'));
    }


    public function dashboard()

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
            // 'total_applications' => $jobposts->sum('total_approved_applications'),
            // 'pending_reviews' => $jobposts->sum('pending_applications'),
        ];


        $statistics2 =[
            'total_jobseeker'=>$users=User::where('role', 'jobseeker')->count(),
            'total_company'=>$users=User::where('role', 'company')->count(),
            'total_application'=>JobApplication::with(['jobPost', 'user'])->count(),



        ];

        // dd($statistics2);

        return view('admin.dashboard', compact('user', 'jobposts', 'statistics','statistics2'));
    }

}
