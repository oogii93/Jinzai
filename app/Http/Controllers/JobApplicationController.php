<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\JobPost;

use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Notifications\Company_Result_Notification;
use App\Notifications\Company_Result_NotificationForAdmin;
use App\Notifications\Company_Result_NotificationForCompany;
use Illuminate\Support\Facades\Auth;
use App\Notifications\JobApplicationNotification;
use App\Notifications\Work_Start_Notification;
use App\Notifications\Work_Start_NotificationForAdmin;
use App\Notifications\Work_Start_NotificationForCompany;


class JobApplicationController extends Controller
{
//   public function store(Request $request, JobPost $jobPost)
//   {
//     $application=JobApplication::create([
//         'job_post_id'=>$jobPost->id,
//         'user_id'=>auth()->id(),
//     ]);

//     $admins=User::where('role', 'admin')->get();

//     foreach ($admins as $admin)
//     {
//         $admin->notify(new JobApplicationNotification($application));
//     }

//     dd($request->all());


//     return redirect()->back()->with('success', '応募が正常に送信されました！');
//   }

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

    public function companyResult(Request $request, JobApplication $application)
    {

          // Validate the request
        $request->validate([
            'company_result' => 'required|in:合格,不合格,辞退',
        ]);

        $application->update([
            'company_result'=>$request->company_result,
            'company_result_updated_by'=>Auth::id(),
            'company_result_updated_at' => \Carbon\Carbon::now()
        ]);


        //notifications

        $applicantUser=$application->user;
        $companyUser=$application->jobPost->user;

        // dd($companyUser);
        $adminUser=User::where('role', 'admin')->get();


        if($applicantUser){
            $applicantUser->notify(new Company_Result_Notification($application));
        }

        if($companyUser){
            $companyUser->notify(new Company_Result_NotificationForCompany($application));
        }


        foreach ($adminUser as $admin){
            $admin->notify(new Company_Result_NotificationForAdmin($application));
        }


        return redirect()->back()->with('success','最終の結果が設定されました。');

    }

    public function companyStartDate(Request $request, JobApplication $application)
    {

          // Validate the request
        $request->validate([
            'work_start' => 'required|date',
        ]);

        $application->update([
            'work_start'=>$request->work_start,
            'work_start_updated_by'=>Auth::id(),
            'work_start_updated_at' => \Carbon\Carbon::now()
        ]);


         //notifications

         $applicantUser=$application->user;
         $companyUser=$application->jobPost->user;

         // dd($companyUser);
         $adminUser=User::where('role', 'admin')->get();


         if($applicantUser){
             $applicantUser->notify(new Work_Start_Notification($application));
         }

         if($companyUser){
             $companyUser->notify(new Work_Start_NotificationForCompany($application));
         }


         foreach ($adminUser as $admin){
             $admin->notify(new Work_Start_NotificationForAdmin($application));
         }


        return redirect()->back()->with('success','Documentの結果が設定されました。');

    }











    public function employerApplications(Request $request)
    {
        $authUser = auth()->user(); // Get the authenticated user

        $effectiveUserId=$authUser->parent_company_id ?? $authUser->id;


        // For jobseekers to view their applications


        $jobpost = JobPost::with(['category', 'user']) // Add user to eager loading
            ->where('user_id', $effectiveUserId) // Only fetch job posts created by the authenticated user
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
            ->whereHas('jobPost', function ($query) use ($effectiveUserId) {
                $query->where('user_id', $effectiveUserId); // Only applications for the authenticated user's job posts
            })
            ->when($status !== 'all', function ($query) use ($status) {
                return $query->where('admin_status', $status);
            })
            ->latest()
            ->paginate();

        $counts = [
            'pending' => JobApplication::whereHas('jobPost', function ($query) use ($effectiveUserId) {
                $query->where('user_id', $effectiveUserId); // Count only applications for this user's job posts
            })->where('admin_status', 'pending')->count(),
            'approved' => JobApplication::whereHas('jobPost', function ($query) use ($effectiveUserId) {
                $query->where('user_id', $effectiveUserId); // Count only applications for this user's job posts
            })->where('admin_status', 'approved')->count(),
            'rejected' => JobApplication::whereHas('jobPost', function ($query) use ($effectiveUserId) {
                $query->where('user_id', $effectiveUserId); // Count only applications for this user's job posts
            })->where('admin_status', 'rejected')->count(),
        ];
        // dd($applications);

        return view('company.employer', compact('applications', 'counts', 'status', 'users', 'company', 'jobpost'));
    }



}
