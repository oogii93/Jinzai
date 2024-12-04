<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\JobPost;
use App\Models\Category;
use App\Models\Category2;
use App\Notifications\JobApplicationNotification;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Notifications\CompanyNotificationForJobPostApproval;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\Notification;

use App\Notifications\NewPostNotification;

class JobPostController extends Controller
{

    use AuthorizesRequests;


    // public function getPostsByTag(Tag $tag)
    // {
    //     $jobposts=JobPost::whereHas('tags', function ($query) use ($tag){
    //         $query->where('tags.id', $tag->id);

    //     })->with(['category', 'user','tags'])->latest()->get();

    //     $categories=Category::get();

    //     return view('main',compact('jobposts', 'categories'));
    // }


    public function getSubcategories(Category $category)
    {
        try {
            $subcategories = $category->subcategories()->select('id', 'name')->get();
            return response()->json($subcategories);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to load subcategories'], 500);
        }
    }




    public function index()
    {
        // For admin, show all posts
        if (auth()->user()->role === 'admin') {
            $jobpost = JobPost::all();
        }
        // For company, show only their posts
        elseif (auth()->user()->role === 'company') {
            $jobpost = JobPost::where('user_id', auth()->id())
            ->with(['category', 'user', 'tags'])
            ->get();
        }
        // For jobseeker, redirect to homepage or show error
        else {
            abort(403, 'Unauthorized action.');
        }

        return view('jobpost.index', compact('jobpost'));
    }

    public function create()
    {

    if(!in_array(auth()->user()->role, ['admin', 'company'])){
        abort(403, 'unauthorized action.');
    }
        $categories=Category::all();
        $categories2=Category2::all();

        $tags = Tag::all();
        // dd($tags);
        return view('jobpost.create', compact('categories','tags','categories2'));
    }

    public function show(string $id)
    {
        $jobpost = JobPost::with('applications','category', 'user', 'tags')->findOrFail($id);


        return view('jobpost.show', compact('jobpost'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        if (!in_array(auth()->user()->role, ['admin', 'company'])) {
            abort(403, 'Unauthorized action.');
        }


        // dd($request->all());





        $validatedData = $request->validate([
            // 'title' => 'nullable',

            // 'working_hour'=>'required',

            //new added
            'title'=>'required',
            'company_name'=>'required',
            'company_furigana'=>'required',
            'company_address'=>'required',
            'homepage_url'=>'required',
            'category_id' => 'required|exists:categories,id',
            'category2_id' => 'required|exists:categories2,id',
            'job_detail'=>'required',
            'type'=>'required',
            'working_location'=>'required',
            'my_car' => 'required|in:可,不可', // Validates radio selection
            'qualification'=>'required',
            'trial_period'=>'required',
            'salary' => 'required',

            'working_hour' => 'required|in:固定,シフト制',
            'working_hour_a' => 'required_if:working_hour,固定',
            'working_hour_b_1' => 'required_if:working_hour,シフト制',
            'working_hour_b_2' => 'nullable',
            'working_hour_b_3' => 'nullable',

            'holiday_type'=>'required',
            'overtime_hour'=>'required',
            'break'=>'required',
            'holidays'=>'required',
            'insurance'=>'required',
            'fire_option' => 'required|in:可,不可',
            'house_option' => 'required|in:可,不可',
            'childcare_option' => 'required|in:可,不可',
            'other'=>'nullable',
            'tags' => 'nullable|array',  // Changed validation rule
            'tags.*' => 'exists:tags,id', // Added validation for each tag ID

            'salary_deadline'=>'nullable|integer|min:1|max:31',
            'salary_payment_month'=>'nullable|in:当月,翌月',
            'salary_payment_day'=>'nullable|integer|min:1|max:31',

            'smoke_option' => 'required|in:可,不可',





        // Required if "yes"





            // 'overtime'=>'required',
            // 'other_allowance'=>'required',

            // 'salary_increase_option' => 'required|in:可,不可', // Validates radio selection
            // 'salary_increase_from' => 'nullable|string|required_if:salary_increase_option,可', // Required if "yes"
            // 'salary_increase_to' => 'nullable|string|required_if:salary_increase_option,可', // Required if "yes"

            // 'bonus_increase_option' => 'required|in:可,不可', // Validates radio selection
            // 'bonus_increase_from' => 'nullable|string|required_if:bonus_increase_option,可', // Required if "yes"
            // 'bonus_increase_to' => 'nullable|string|required_if:bonus_increase_option,可', // Required if "yes"






        ]);

    //  dd($validatedData);



        $jobpost = JobPost::create([
            'salary' => $validatedData['salary'],
            'working_location' => $validatedData['working_location'],
            'job_detail' => $validatedData['job_detail'],
            'qualification' => $validatedData['qualification'],
            'other' => $validatedData['other'],
            'category_id' => $validatedData['category_id'],
            'user_id' => Auth::id(),

            'company_name' => $validatedData['company_name'],
            'company_furigana' => $validatedData['company_furigana'],
            'company_address' => $validatedData['company_address'],
            'homepage_url' => $validatedData['homepage_url'],
            'type' => $validatedData['type'],
            'my_car' => $validatedData['my_car'],
            'trial_period' => $validatedData['trial_period'],


            'overtime_hour' => $validatedData['overtime_hour'],
            'break' => $validatedData['break'],
            'holidays' => $validatedData['holidays'],
            'insurance' => $validatedData['insurance'],
            'fire_option' => $validatedData['fire_option'],
            'house_option' => $validatedData['house_option'],
            'childcare_option' => $validatedData['childcare_option'],

            'status' => '進行中',
            'category2_id'=>$validatedData['category2_id'],
            'title'=>$validatedData['title'],


            'working_hour' => $validatedData['working_hour'],
            'working_hour_a'=>$validatedData['working_hour'] ==='固定' ?
            ($validatedData['working_hour_a'] ?? null):null,

            'working_hour_b_1'=>$validatedData['working_hour'] ==='シフト制' ?
            ($validatedData['working_hour_b_1'] ?? null):null,

            'working_hour_b_2'=>$validatedData['working_hour'] ==='シフト制' ?
            ($validatedData['working_hour_b_2'] ?? null):null,

            'working_hour_b_3'=>$validatedData['working_hour'] ==='シフト制' ?
            ($validatedData['working_hour_b_3'] ?? null):null,


            'holiday_type'=>$validatedData['holiday_type'],
            'salary_deadline'=>$validatedData['salary_deadline'],
            'salary_payment_month'=>$validatedData['salary_payment_month'],
            'salary_payment_day'=>$validatedData['salary_payment_day'],
            'smoke_option'=>$validatedData['smoke_option']

        ]);


        $users=User::where('id', '!=', auth()->id())->get();

        Notification::send($users, new NewPostNotification($jobpost));

        //







        return redirect()->route('jobpost.index')->with('success', '求人投稿が正常に作成されました。
管理者の承認後、Web サイトに掲載されます。');
    }


    public function showByCategory(Category $category)
    {
        $categories = Category::all();
        $jobpost = $category->jobPosts()->paginate(8); // Paginate the posts
        return view('main', compact('jobpost', 'categories'));
    }


    public function edit(string $id)
    {
        $jobpost = JobPost::findOrFail($id);

        // Check if user can edit this job post
        if (auth()->user()->role === 'admin' ||
            (auth()->user()->role === 'company' && auth()->id() === $jobpost->user_id)) {
            $categories = Category::all();
            return view('jobpost.edit', compact('jobpost', 'categories'));
        }

        abort(403, 'Unauthorized action.');
    }

    public function update(Request $request, string $id)
    {
        $jobpost = JobPost::findOrFail($id);
     // Check if user can update this job post
     if (!(auth()->user()->role === 'admin' ||
     (auth()->user()->role === 'company' && auth()->id() === $jobpost->user_id))) {
     abort(403, 'Unauthorized action.');
 }

        $validatedData = $request->validate([
            'title' => 'required',
            'salary' => 'required',
            'working_hour' => 'required',
            'working_location' => 'required',
            'job_detail' => 'required',
            'qualification' => 'required',
            'other' => 'nullable',
            'category_id' => 'required|exists:categories,id',
        ]);

        $jobpost->update($validatedData);

        return redirect()->route('jobpost.index')->with('success', 'ジョブが正常に更新されました。');
    }

    public function destroy(string $id)
    {
        $jobpost = JobPost::findOrFail($id);


      // Check if user can delete this job post
        if (!(auth()->user()->role === 'admin' ||
            (auth()->user()->role === 'company' && auth()->id() === $jobpost->user_id))) {
            abort(403, 'Unauthorized action.');
        }

        $jobpost->delete();

        return redirect()->route('jobpost.index')->with('success', 'ジョブは正常に削除されました。');
    }


    public function apply(Request $request, $id)
    {
        if(auth()->user()->role !== 'jobseeker')
        {
            return redirect()->back()->with('error', ' 求人に応募できるのは求職者のみです。');
        }

        $jobpost=JobPost::findOrFail($id);



        if($jobpost->applications()->where('user_id', auth()->id())->exists()){
            return redirect()->back()->with('error', 'あなたはすでにこの仕事に応募しています');
        }

        // $request->validate([
        //     'cover_letter'=>'required|string|min:50',
        //     'resume'=>'required|file|mimes:pdf,doc,docx|max:2048'
        // ]);


        // $resumePath=$request->file('resume')->store('resumes', 'public');

        $application=new JobApplication([
            'user_id'=>auth()->id(),
            'job_post_id'=>$jobpost->id,
            // 'cover_letter'=>$request->cover_letter,
            // 'resume_path'=>$resumePath,
            'admin_status'=>'pending',
            'company_status'=>'pending'

        ]);


        $application->save();

        $admins=User::where('role', 'admin')->get();

        foreach ($admins as $admin)
        {
            $admin->notify(new JobApplicationNotification($application));
        }

        return redirect()->back()->with('success', 'お申し込みは正常に送信されました。');



    }



    public function pendingPosts()
    {
        if(auth()->user()->role !=='admin')
        {
            abort(403, 'Unauthorized action.');
        }

        $pendingPosts=JobPost::where('status', '進行中')->paginate(10);
        return view('admin.pending-posts', compact('pendingPosts'));
    }







    public function reject(Request $request,$id)
    {
        if(auth()->user()->role !=='admin')
        {
            abort(403, 'Unauthorized action');
        }
     $jobPost=JobPost::findOrFail($id);
     $jobPost->update([
        'status'=>'拒否'
     ]);

      // Notify the user who created the job post
   $jobPost->user->notify(new CompanyNotificationForJobPostApproval($jobPost));


     return redirect()->back()->with('success','求人投稿は拒否されました。');
    }

    // protected function notifyJobSeekers(JobPost $jobPost)
    // {
    //     $jobSeekers = User::where('role', 'job_seeker')->get();

    //     foreach ($jobSeekers as $jobSeeker) {
    //         $jobSeeker->notify(new NewJobPostApprovedNotification($jobPost));
    //     }
    // }



    public function approve($id)
{
    if (auth()->user()->role !== 'admin') {
        abort(403, 'Unauthorized action.');
    }

    $jobPost = JobPost::findOrFail($id);
    $jobPost->update(['status' => '承認']);


   // Notify the user who created the job post
   $jobPost->user->notify(new CompanyNotificationForJobPostApproval($jobPost));



    return redirect()->back()->with('success', '求人投稿が正常に承認されました。');
}












}
