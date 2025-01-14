<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Notifications\NewUserRegisterNotification;
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
use Illuminate\Support\Facades\Notification;

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
        'part_time',

        // new datas

        'education_startEnd_1',
        'education_startEnd_2',
        'education_startEnd_3',

        'education_year_4',
        'education_month_4',
        'education_school_4',
        'education_startEnd_4',

        'education_year_5',
        'education_month_5',
        'education_school_5',
        'education_startEnd_5',

        'education_year_6',
        'education_month_6',
        'education_school_6',
        'education_startEnd_6',

        'education_year_7',
        'education_month_7',
        'education_school_7',
        'education_startEnd_7',

        'education_year_8',
        'education_month_8',
        'education_school_8',
        'education_startEnd_8',

        'education_year_9',
        'education_month_9',
        'education_school_9',
        'education_startEnd_9',

        'education_year_10',
        'education_month_10',
        'education_school_10',
        'education_startEnd_10',

        'education_year_11',
        'education_month_11',
        'education_school_11',
        'education_startEnd_11',

        'education_year_12',
        'education_month_12',
        'education_school_12',
        'education_startEnd_12',

        'education_year_13',
        'education_month_13',
        'education_school_13',
        'education_startEnd_13',

        'education_year_14',
        'education_month_14',
        'education_school_14',
        'education_startEnd_14',

        'education_year_15',
        'education_month_15',
        'education_school_15',
        'education_startEnd_15',




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


    public function store(Request $request): RedirectResponse
    {
        // dd($request->role);
        // Step 1: Define validation rules based on role
        $commonRules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'role' => ['required', 'in:jobseeker,company'],
            'profile_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:20480'],
            'address' => ['nullable', 'string'],
            'phone_number' => ['nullable', 'string'],
            'mobile_number' => ['nullable', 'string'],
        ];



            // For company, we only need the company-specific fields
    if ($request->role === 'company') {
        $additionalRules = [
            // 'company_description' => ['required', 'string'],
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
                'check_approve'=>['required','accepted'],
                //new

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
                    // 'company_description' => $request->company_description,
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



        }else{


     $user->companyProfile()->create(
        [
            // 'company_description'=>$request->company_description,
            'industry'=>$request->industry,
            'website'=>$request->website,
        ]
     );
        }


        event(new Registered($user));

        $user->notify(new TempPasswordNotification($tempPassword));

        $admins=User::where('role', 'admin')->get();
        if($admins->count()>0){
            Notification::send($admins, new NewUserRegisterNotification($user, $request->role));

        }

        return redirect()->route('login')
        ->with('success', '登録が完了しました。仮パスワードはメールでご確認ください。');

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
