<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Notifications\TempPasswordNotification;
use App\Notifications\SetupPasswordNotification;

class RegisteredUserController extends Controller
{
    /**
     *
     *
     *
     * Display the registration view.
     */


     protected $jobseekerFields = [
        'furigana',
        'date_of_birth',
        'gender',
        'address',
        'phone_number',
        'mobile_number',
        'education_year_1',
        'education_month_1',
        'education_school_1',
        'education_year_2',
        'education_month_2',
        'education_school_2',
        'education_year_3',
        'education_month_3',
        'education_school_3',
        'appear_point',
        'study_japan',
        'skill',
        'reason',
        'language',
        'license',
        'hobby',
        'part_time'
    ];


    protected $companyFields = [
        'company_name' => 'name',  // maps to name field
        'address',
        'phone_number',
        'mobile_number'
        // Add any other company-specific fields
    ];








    public function createJobseeker(): View
    {
        return view('auth.register-jobseeker');
    }



    public function createCompany()
    {
        return view('auth.register-company');  // New company registration view
    }




    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */


    //  public function store(Request $request)
    //  {
    //      // Get validation rules based on role
    //      $validationRules = $this->getValidationRules($request->role);

    //      // Validate the request
    //      $validated = $request->validate($validationRules);

    //      // Create user with role-specific fields
    //      $userData = $this->getUserData($request);

    //      $user = User::create($userData);

    //      event(new Registered($user));

    //      Auth::login($user);

    //      return redirect($this->getRedirectRoute($user->role));
    //  }
    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],


    //         'password' => ['nullable', Rules\Password::defaults()],
    //         'role'=>['required'],
    //         'furigana'=>['nullable','string'],




    //         // 'date_of_birth'=>['nullable','date'],

    //         'year' => 'required|integer',
    //         'month' => 'required|integer',
    //         'day' => 'required|integer',


    //         'gender'=>['nullable','string'],
    //         'address'=>['nullable','string'],
    //         'phone_number'=>['nullable','string'],
    //         'mobile_number'=>['nullable','string'],

    //         'education_year_1'=>['nullable','integer'],
    //         'education_month_1'=>['nullable','integer'],
    //         'education_school_1'=>['nullable','string'],

    //         'education_year_2'=>['nullable','integer'],
    //         'education_month_2'=>['nullable','integer'],
    //         'education_school_2'=>['nullable','string'],

    //         'education_year_3'=>['nullable','integer'],
    //         'education_month_3'=>['nullable','integer'],
    //         'education_school_3'=>['nullable','string'],

    //         'appear_point'=>['nullable', 'string'],
    //         'study_japan'=>['nullable', 'string'],
    //         'skill'=>['nullable', 'string'],
    //         'reason'=>['nullable', 'string'],
    //         'language'=>['nullable', 'string'],
    //         'license'=>['nullable', 'string'],
    //         'hobby'=>['nullable', 'string'],
    //         'part_time'=>['nullable', 'string'],


    //         'profile_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'], // Ensure validation for the image




    //     ]);

    //     // dump($request);

    //        // Generate a random temporary password

    //     $tempPassword=Str::random(10);

    //     $profileImagePath = null;

    //     if($request->hasFile('profile_image')){
    //         $profileImagePath=$request->file('profile_image')->store('profile-image', 'public');
    //     }


    //      // Combine year, month, and day to create a valid date
    // $date_of_birth = sprintf('%04d-%02d-%02d', $request->year, $request->month, $request->day);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($tempPassword),
    //         'is_temporary_password' => true, // Add this field to track temporary passwords
    //         'role'=>$request['role'],

    //      'profile_image' => $profileImagePath,

    //         'furigana' => $request->furigana,
    //         'date_of_birth'=>$date_of_birth,
    //         'gender'=>$request->gender,
    //         'address'=>$request->address,
    //         'phone_number'=>$request->phone_number,
    //         'mobile_number'=>$request->mobile_number,
    //         'education_year_1'=>$request->education_year_1,
    //         'education_month_1'=>$request->education_month_1,
    //         'education_school_1'=>$request->education_school_1,

    //         'education_year_2'=>$request->education_year_2,
    //         'education_month_2'=>$request->education_month_2,
    //         'education_school_2'=>$request->education_school_2,

    //         'education_year_3'=>$request->education_year_3,
    //         'education_month_3'=>$request->education_month_3,
    //         'education_school_3'=>$request->education_school_3,


    //         'appear_point'=>$request->appear_point,
    //         'study_japan'=>$request->study_japan,
    //         'skill'=>$request->skill,
    //         'reason'=>$request->reason,
    //         'language'=>$request->language,
    //         'license'=>$request->license,
    //         'hobby'=>$request->hobby,
    //         'part_time'=>$request->part_time,
    //     ]);






    //     event(new Registered($user));


    // //       // Generate a signed URL with the user's ID
    // //       $setupUrl = URL::temporarySignedRoute(
    // //         'password.setup',
    // //         now()->addHours(24), // URL expires in 24 hours
    // //         // ['user' => $user->id]
    // //         ['email' =>$user->email]
    // //     );


    // // $user->notify(new SetupPasswordNotification($setupUrl));

    // $user->notify(new TempPasswordNotification($tempPassword));

    // // Don't login the user immediately
    // // return redirect()->route('password.setup.sent')
    // // ->with('status', 'Registration successful! Please check your email to set up your password.');

    // return redirect()->route('login')
    //     ->with('status', 'Registration successful! Please check your email for your temporary password.');



    // }

    public function store(Request $request): RedirectResponse
    {
        // dd($request->role);
        // Step 1: Define validation rules based on role
        $commonRules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'role' => ['required', 'in:jobseeker,company'],
            'profile_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'address' => ['nullable', 'string'],
            'phone_number' => ['nullable', 'string'],
            'mobile_number' => ['nullable', 'string'],
        ];



            // For company, we only need the company-specific fields
    if ($request->role === 'company') {
        $additionalRules = [
            'company_description' => ['required', 'string'],
            'industry' => ['required', 'string'],
            'website' => ['nullable', 'url'],
        ];
    } else {


            $additionalRules = [
                'furigana' => ['nullable', 'string'],
                'year' => ['required', 'integer'],
                'month' => ['required', 'integer'],
                'day' => ['required', 'integer'],
                'gender' => ['nullable', 'string'],
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
            ]  ;

    }






        $validatedData = $request->validate(array_merge($commonRules, $additionalRules));

        $profileImagePath=null;
        if($request->hasFile('profile_image')){
            $profileImagePath=$request->file('profile_image')->store('profile-image', 'public');
        }

            // Step 5: Generate temporary password
    $tempPassword = Str::random(10);

        //
        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($tempPassword),
            'is_temporary_password' => true,
            'role' => $request->role,
            'profile_image' => $profileImagePath,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'mobile_number' => $request->mobile_number,
        ]);

            // For company users, create company profile
            if ($request->role === 'company') {
                $user->companyProfile()->create([
                    'company_description' => $request->company_description,
                    'industry' => $request->industry,
                    'website' => $request->website,
                ]);
            }

            DB::commit(); // Commit transaction


        if($request->role === 'jobseeker'){
            $date_of_birth = sprintf('%04d-%02d-%02d',
            $request->year,
            $request->month,
            $request->day
        );


        $user->update([
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
        ]);


        }else{


     $user->companyProfile()->create(
        [
            'company_description'=>$request->company_description,
            'industry'=>$request->industry,
            'website'=>$request->website,
        ]
     );
        }


        event(new Registered($user));

        $user->notify(new TempPasswordNotification($tempPassword));

        return redirect()->route('login')
        ->with('status', 'Registration successful! Please check your email for your temporary password.');

    }



    // Add these new methods to handle password setup
public function showSetupForm(Request $request)
{
    // Verify the signature of the URL
    if (! $request->hasValidSignature()) {
        abort(403, 'Invalid signature.');
    }

    // $user=User::findOrFail($request->user);
    $user=User::where('email', $request->email)

    ->firstOrFail();

    $url=URL::temporarySignedRoute(
        'password.setup.complete',
        now()->addHours(1),
        ['email' =>$user->email]
    );

    return view('auth.setup-password', ['user' => $user->id, 'url'=>$url]);
}

public function setupPassword(Request $request)
{
    // Verify the signature of the URL
    if (! $request->hasValidSignature()) {
        abort(403, 'Invalid signature');
    }

    $request->validate([
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'user'=>['required', 'exists:users,id']
    ]);

    $user = User::findOrFail($request->user);

    $user->forceFill([
        'password'=>Hash::make($request->password),
        'password_set_at'=>now(),
    ]);

    // $user->password = Hash::make($request->password);
    // $user->save();

    Auth::login($user);

    return redirect()->route('dashboard')->with('status', 'Password set successfully!');
}

}
