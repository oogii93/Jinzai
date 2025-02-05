<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\JobPost;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\JobApplication;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TempPasswordNotification;
use App\Notifications\NewUserRegisterNotification;

class CompanyDashboardController extends Controller
{
    public function index()
    {
        $authUser = Auth::user();
        $effectiveUserId = $authUser->parent_company_id ?? $authUser->id;

        // Get job posts with their admin-approved applications
        $jobposts = JobPost::where('user_id', $effectiveUserId)
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

          // If it's a sub-account, get the main company user for company details
    if ($authUser->parent_company_id) {
        $user = User::find($authUser->parent_company_id);
    } else {
        $user = $authUser;
    }

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

    // public function update(Request $request)
    // {
    //     $user=Auth::user();

    //     if ($user->role !== 'company') {
    //         abort(403, 'Unauthorized access');
    //     }


    //     $rules = [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => [
    //             'required',
    //             'string',
    //             'lowercase',
    //             'email',
    //             'max:255',
    //             Rule::unique('users')->ignore($user->id)
    //         ],
    //       'email_2' => ['nullable', 'string', 'email', Rule::unique('users', 'email')],
    //         'profile_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:20480'],
    //         'address' => ['nullable', 'string'],
    //         'phone_number' => ['nullable', 'string'],
    //         'mobile_number' => ['nullable', 'string'],
    //         // Company-specific fields
    //         // 'company_description' => ['required', 'string'],
    //         'industry' => ['required', 'string'],
    //         'website' => ['nullable', 'url'],
    //         'employee_number'=>['nullable', 'string'],
    //         'profit'=>['nullable','string'],
    //         'stablished'=>['nullable','date'],
    //         'details'=>['nullable','string']
    //     ];

    //     $validatedDate=$request->validate($rules);

    //    // Handle profile image upload
    //    if ($request->hasFile('profile_image')) {
    //     // Delete old profile image if exists
    //     if ($user->profile_image) {
    //         try {
    //             Storage::disk('public')->delete($user->profile_image);
    //         } catch (\Exception $e) {
    //             // Log the error but continue with the update
    //             \Log::error('Failed to delete old profile image: ' . $e->getMessage());
    //         }
    //     }

    //     // Store new profile image
    //     $profileImagePath = $request->file('profile_image')->store('profile-image', 'public');
    //     $user->profile_image = $profileImagePath;
    // }





    //     $user->fill([
    //         'name'=>$request->name,
    //         'email'=>$request->email,
    //         'address'=>$request->address,
    //         'phone_number'=>$request->phone_number,
    //         'mobile_number'=>$request->mobile_number,
    //     ])->save();


    //     // $companyProfile=$user->companyProfile ?? $user->companyProfile()->create([]);
    //     $companyProfile=$user->companyProfile;
    //     $oldEmail2=$companyProfile;


    //     $companyProfile->update([

    //         'company_description' => $request->company_description,
    //         'industry' => $request->industry,
    //         'website' => $request->website,
    //         'employee_number'=>$request->employee_number,
    //         'profit'=>$request->profit,
    //         'stablished'=>$request->stablished,
    //         'details'=>$request->details,
    //         'email_2'=>$request->email_2

    //     ]);


    //     if($request->filled('email_2') && $request->email_2 !== $oldEmail2){
    //         if ($oldEmail2) {
    //             $oldSecondaryUser = User::where('email', $oldEmail2)
    //                                   ->where('parent_company_id', $user->id)
    //                                   ->first();
    //             if ($oldSecondaryUser) {
    //                 $oldSecondaryUser->delete();
    //             }
    //         }


    //         $tempPassword=Str::random(10);
    //         $secondUser=User::create([
    //             'name' => $request->name,
    //             'email' => $request->email_2,
    //             'password' => Hash::make($tempPassword),
    //             'role' => 'company',
    //             'address' => $request->address,
    //             'phone_number' => $request->phone_number,
    //             'mobile_number' => $request->mobile_number,
    //             'parent_company_id' => $user->id, // Link to main company user
    //             'admin_check_approve' => $user->admin_check_approve, // Inherit approval status
    //         ]);

    //         // $secondUserProfile=$companyProfile->replicate();//Laravel replicate of company
    //         // $secondUserProfile->user_id=$secondUser->id;
    //         // $secondUserProfile->save();

    //              // Send temporary password notification

    //              $secondUser->notify(new TempPasswordNotification($tempPassword));


    //              $admins=User::where('role','admin')->get();
    //                 if($admins->count() >0){
    //                     Notification::send($admins, new NewUserRegisterNotification($secondUser, 'company'));
    //                 }
    //                 return redirect()->route('company.dashboard')
    //                 ->with('success', 'プロファイルが正常に更新され、サブアカウントが作成されました。仮パスワードは登録されたメールアドレスに送信されました。');



    //     }

    //     return redirect()->route('company.dashboard')
    //             ->with('success', 'プロファイルが正常に更新されました。');

    // }



    public function update(Request $request)
    {
        $user = Auth::user();
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
            'email_2' => ['nullable', 'string', 'email', Rule::unique('users', 'email')],
            'profile_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:20480'],
            'address' => ['nullable', 'string'],
            'phone_number' => ['nullable', 'string'],
            'mobile_number' => ['nullable', 'string'],
            'industry' => ['required', 'string'],
            'website' => ['nullable', 'url'],
            'employee_number' => ['nullable', 'string'],
            'profit' => ['nullable', 'string'],
            'stablished' => ['nullable', 'date'],
            'details' => ['nullable', 'string']
        ];

        $validatedData = $request->validate($rules);

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            if ($user->profile_image) {
                try {
                    Storage::disk('public')->delete($user->profile_image);
                } catch (\Exception $e) {
                    \Log::error('Failed to delete old profile image: ' . $e->getMessage());
                }
            }
            $profileImagePath = $request->file('profile_image')->store('profile-image', 'public');
            $user->profile_image = $profileImagePath;
        }

        // Update main user
        $user->fill([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'mobile_number' => $request->mobile_number,
        ])->save();

        // Update company profile
        $companyProfile = $user->companyProfile;
        $oldEmail2 = $companyProfile->email_2; // Fixed: Get the old email_2 value

        $companyProfile->update([
            'company_description' => $request->company_description,
            'industry' => $request->industry,
            'website' => $request->website,
            'employee_number' => $request->employee_number,
            'profit' => $request->profit,
            'stablished' => $request->stablished,
            'details' => $request->details,
            'email_2' => $request->email_2
        ]);

        // Handle second user creation/update
        if ($request->filled('email_2') && $request->email_2 !== $oldEmail2) {
            // Delete old secondary user if exists
            if ($oldEmail2) {
                User::where('email', $oldEmail2)
                    ->where('parent_company_id', $user->id)
                    ->delete();
            }

            $tempPassword = Str::random(10);

            // Create new secondary user
            $secondUser = User::create([
                'name' => $request->name . ' (Sub Account)',
                'email' => $request->email_2,
                'password' => Hash::make($tempPassword),
                'role' => 'company',
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'mobile_number' => $request->mobile_number,
                'parent_company_id' => $user->id,
                'admin_check_approve' => $user->admin_check_approve,
            ]);

            // Send notifications
            $secondUser->notify(new TempPasswordNotification($tempPassword));

            $admins = User::where('role', 'admin')->get();
            if ($admins->count() > 0) {
                Notification::send($admins, new NewUserRegisterNotification($secondUser, 'company'));
            }

            return redirect()->route('company.dashboard')
                ->with('success', 'プロファイルが正常に更新され、サブアカウントが作成されました。仮パスワードは登録されたメールアドレスに送信されました。');
        }

        return redirect()->route('company.dashboard')
                ->with('success', 'プロファイルが正常に更新されました。');
    }


}
