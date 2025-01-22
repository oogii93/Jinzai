<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use App\Notifications\JobSeekerProfileNotification;


class JobSeekerProfileController extends Controller
{
    public function edit()
    {
        $user=Auth::user();

        if($user->role !== 'jobseeker'){
            return redirect()->back()->with('error', 'not accessable');
        }

        return view('jobseeker.profile-edit', compact('user'));
    }



    public function update(Request $request)
    {
          // Get the currently logged-in jobseeker
          $user = Auth::user();


          // Ensure only jobseekers can update their profile
          if ($user->role !== 'jobseeker') {
              return redirect()->back()->with('error', 'Unauthorized access');
          }


          $commonRules=[
            'name'=>['required', 'string', 'max:255'],
            
            'profile_image'=>['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:20480'],
            'address'=>['nullable', 'string'],
            'phone_number'=>['nullable', 'string'],
            'mobile_number'=>['nullable', 'string'],
          ];


          $additionalRules=[
            'furigana'=>['nullable', 'string'],

            'country'=>['nullable', 'string'],
            'year'=>['required', 'integer'],
            'month'=>['required', 'integer'],
            'day'=>['required', 'integer'],
            'gender'=>['nullable', 'string'],

            'education_year_1' => ['nullable', 'integer'],
            'education_month_1' => ['nullable', 'integer'],
            'education_school_1' => ['nullable', 'string'],
            'education_year_2' => ['nullable', 'integer'],
            'education_month_2' => ['nullable', 'integer'],
            'education_school_2' => ['nullable', 'string'],
            'education_year_3' => ['nullable', 'integer'],
            'education_month_3' => ['nullable', 'integer'],
            'education_school_3' => ['nullable', 'string'],

            'appear_point' => ['nullable', 'string'],
            'study_japan' => ['nullable', 'string'],
            'skill' => ['nullable', 'string'],
            'reason' => ['nullable', 'string'],
            'language' => ['nullable', 'string'],
            'license' => ['nullable', 'string'],
            'hobby' => ['nullable', 'string'],
            'part_time' => ['nullable', 'string'],
            'check_approve'=>['required','accepted'],

            'education_startEnd_1'=>['nullable', 'string'],
            'education_startEnd_2'=>['nullable', 'string'],
            'education_startEnd_3'=>['nullable', 'string'],

            'education_year_4' => ['nullable', 'integer'],
            'education_month_4' =>['nullable', 'integer'],
            'education_school_4'=>['nullable','string'],
            'education_startEnd_4'=>['nullable','string'],

            'education_year_5' => ['nullable', 'integer'],
            'education_month_5' =>['nullable', 'integer'],
            'education_school_5'=>['nullable','string'],
            'education_startEnd_5'=>['nullable','string'],

            'education_year_6' => ['nullable', 'integer'],
            'education_month_6' =>['nullable', 'integer'],
            'education_school_6'=>['nullable','string'],
            'education_startEnd_6'=>['nullable','string'],

            'education_year_7' => ['nullable', 'integer'],
            'education_month_7' =>['nullable', 'integer'],
            'education_school_7'=>['nullable','string'],
            'education_startEnd_7'=>['nullable','string'],

            'education_year_8' => ['nullable', 'integer'],
            'education_month_8' =>['nullable', 'integer'],
            'education_school_8'=>['nullable','string'],
            'education_startEnd_8'=>['nullable','string'],

            'education_year_9' => ['nullable', 'integer'],
            'education_month_9' =>['nullable', 'integer'],
            'education_school_9'=>['nullable','string'],
            'education_startEnd_9'=>['nullable','string'],

            'education_year_10' => ['nullable', 'integer'],
            'education_month_10' =>['nullable', 'integer'],
            'education_school_10'=>['nullable','string'],
            'education_startEnd_10'=>['nullable','string'],

            'education_year_11' => ['nullable', 'integer'],
            'education_month_11' =>['nullable', 'integer'],
            'education_school_11'=>['nullable','string'],
            'education_startEnd_11'=>['nullable','string'],

            'education_year_12' => ['nullable', 'integer'],
            'education_month_12' =>['nullable', 'integer'],
            'education_school_12'=>['nullable','string'],
            'education_startEnd_12'=>['nullable','string'],

            'education_year_13' => ['nullable', 'integer'],
            'education_month_13' =>['nullable', 'integer'],
            'education_school_13'=>['nullable','string'],
            'education_startEnd_13'=>['nullable','string'],

            'education_year_14' => ['nullable', 'integer'],
            'education_month_14' =>['nullable', 'integer'],
            'education_school_14'=>['nullable','string'],
            'education_startEnd_14'=>['nullable','string'],

            'education_year_15' => ['nullable', 'integer'],
            'education_month_15' =>['nullable', 'integer'],
            'education_school_15'=>['nullable','string'],
            'education_startEnd_15'=>['nullable','string'],


          ];

          $validatedData=$request->validate(array_merge($commonRules, $additionalRules));



          


        //   $profileImagePath = $user->profile_image;

          if($request->hasFile('profile_image')){

            if($user->profile_image){
                try{
                    Storage::disk('public')->delete($user->profile_image);
                }
                catch(\Exception $e){
                    \Log::error('Failed to delete old profile image: ' . $e->getMessage());
                }
               

            }

              // Delete existing image if it exists

       


// Store new image
$profileImagePath = $request->file('profile_image')->store('profile-images', 'public');

$validatedData['profile_image']=$profileImagePath;
}

                    // Prepare date of birth
                    $date_of_birth = sprintf('%04d-%02d-%02d',
                    $request->year,
                    $request->month,
                    $request->day
                );

                // dd($request->all());


             $user->update([
                'name' => $request->name,
                'country' => $request->country,
                'profile_image' => $profileImagePath,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'mobile_number' => $request->mobile_number,
                'furigana' => $request->furigana,
                'date_of_birth' => $date_of_birth,
                'gender' => $request->gender,


                'education_year_1' => $request->education_year_1,
                'education_month_1' => $request->education_month_1,
                'education_school_1' => $request->education_school_1,
                'education_year_2' => $request->education_year_2,
                'education_month_2' => $request->education_month_2,
                'education_school_2' => $request->education_school_2,
                'education_year_3' => $request->education_year_3,
                'education_month_3' => $request->education_month_3,
                'education_school_3' => $request->education_school_3,

                'appear_point' => $request->appear_point,
                'study_japan' => $request->study_japan,
                'skill' => $request->skill,
                'reason' => $request->reason,
                'language' => $request->language,
                'license' => $request->license,
                'hobby' => $request->hobby,
                'part_time' => $request->part_time,
                'check_approve'=>$request->check_approve,

                //new data

                'education_startEnd_1'=>$request->education_startEnd_1,
                'education_startEnd_2'=>$request->education_startEnd_2,
                'education_startEnd_3'=>$request->education_startEnd_3,

                'education_year_4'=>$request->education_year_4,
                'education_month_4'=>$request->education_month_4,
                'education_school_4'=>$request->education_school_4,
                'education_startEnd_4'=>$request->education_startEnd_4,

                'education_year_5'=>$request->education_year_5,
                'education_month_5'=>$request->education_month_5,
                'education_school_5'=>$request->education_school_5,
                'education_startEnd_5'=>$request->education_startEnd_5,

                'education_year_6'=>$request->education_year_6,
                'education_month_6'=>$request->education_month_6,
                'education_school_6'=>$request->education_school_6,
                'education_startEnd_6'=>$request->education_startEnd_6,

                'education_year_7'=>$request->education_year_7,
                'education_month_7'=>$request->education_month_7,
                'education_school_7'=>$request->education_school_7,
                'education_startEnd_7'=>$request->education_startEnd_7,

                'education_year_8'=>$request->education_year_8,
                'education_month_8'=>$request->education_month_8,
                'education_school_8'=>$request->education_school_8,
                'education_startEnd_8'=>$request->education_startEnd_8,

                'education_year_9'=>$request->education_year_9,
                'education_month_9'=>$request->education_month_9,
                'education_school_9'=>$request->education_school_9,
                'education_startEnd_9'=>$request->education_startEnd_9,

                'education_year_10'=>$request->education_year_10,
                'education_month_10'=>$request->education_month_10,
                'education_school_10'=>$request->education_school_10,
                'education_startEnd_10'=>$request->education_startEnd_10,

                'education_year_11'=>$request->education_year_11,
                'education_month_11'=>$request->education_month_11,
                'education_school_11'=>$request->education_school_11,
                'education_startEnd_11'=>$request->education_startEnd_11,

                'education_year_12'=>$request->education_year_12,
                'education_month_12'=>$request->education_month_12,
                'education_school_12'=>$request->education_school_12,
                'education_startEnd_12'=>$request->education_startEnd_12,

                'education_year_13'=>$request->education_year_13,
                'education_month_13'=>$request->education_month_13,
                'education_school_13'=>$request->education_school_13,
                'education_startEnd_13'=>$request->education_startEnd_13,

                'education_year_14'=>$request->education_year_14,
                'education_month_14'=>$request->education_month_14,
                'education_school_14'=>$request->education_school_14,
                'education_startEnd_14'=>$request->education_startEnd_14,

                'education_year_15'=>$request->education_year_15,
                'education_month_15'=>$request->education_month_15,
                'education_school_15'=>$request->education_school_15,
                'education_startEnd_15'=>$request->education_startEnd_15,


            ]);


            $admins = User::where('role', 'admin')->get();


            if ($admins->isEmpty()) {
                \Log::info('No admin users found.');
            } else {
                Notification::send($admins, new JobSeekerProfileNotification($user, $request->role));
            }

            return redirect()->route('jobseeker.dashboard')
            ->with('success', '更新は成功しました。');
    }
}
