<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\JobPost;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

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

        $tags = Tag::all();
        // dd($tags);
        return view('jobpost.create', compact('categories','tags'));
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
            'title' => 'required',
            'salary' => 'required',
            'working_hour'=>'required',
            'working_location'=>'required',
            'job_detail'=>'required',
            'qualification'=>'required',
            'other'=>'nullable',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',  // Changed validation rule
            'tags.*' => 'exists:tags,id', // Added validation for each tag ID

            //new added
            'company_name'=>'required',
            'company_furigana'=>'required',
            'company_address'=>'required',
            'homepage_url'=>'required',
            'type'=>'required',
            'my_car' => 'required|in:可,不可', // Validates radio selection
            'trial_period'=>'required',
            'overtime'=>'required',
            'other_allowance'=>'required',

            'salary_increase_option' => 'required|in:可,不可', // Validates radio selection
            'salary_increase_from' => 'nullable|string|required_if:salary_increase_option,可', // Required if "yes"
            'salary_increase_to' => 'nullable|string|required_if:salary_increase_option,可', // Required if "yes"

            'bonus_increase_option' => 'required|in:可,不可', // Validates radio selection
            'bonus_increase_from' => 'nullable|string|required_if:bonus_increase_option,可', // Required if "yes"
            'bonus_increase_to' => 'nullable|string|required_if:bonus_increase_option,可', // Required if "yes"

            'overtime_hour'=>'required',
            'break'=>'required',
            'holidays'=>'required',
            'insurance'=>'required',
            'fire_option' => 'required|in:可,不可',
            'house_option' => 'required|in:可,不可',
            'childcare_option' => 'required|in:可,不可',





        ]);


        $jobpost = JobPost::create([
            'title' => $validatedData['title'],
            'salary' => $validatedData['salary'],
            'working_hour' => $validatedData['working_hour'],
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
            'overtime' => $validatedData['overtime'],
            'other_allowance' => $validatedData['other_allowance'],

            'salary_increase_option' => $validatedData['salary_increase_option'],
            'salary_increase_from' => $validatedData['salary_increase_option'] === 'yes' ? $validatedData['salary_increase_from'] : null,
            'salary_increase_to' => $validatedData['salary_increase_option'] === 'yes' ? $validatedData['salary_increase_to'] : null,

            'bonus_increase_option' => $validatedData['bonus_increase_option'],
            'bonus_increase_from' => $validatedData['bonus_increase_option'] === 'yes' ? $validatedData['bonus_increase_from'] : null,
            'bonus_increase_to' => $validatedData['bonus_increase_option'] === 'yes' ? $validatedData['bonus_increase_to'] : null,

            'overtime_hour' => $validatedData['overtime_hour'],
            'break' => $validatedData['break'],
            'holidays' => $validatedData['holidays'],
            'insurance' => $validatedData['insurance'],
            'fire_option' => $validatedData['fire_option'],
            'house_option' => $validatedData['house_option'],
            'childcare_option' => $validatedData['childcare_option'],

            'status' => '進行中',
        ]);

        //
        if($request->has('tags')){
            $jobpost->tags()->attach($request->tags);
        }



        return redirect()->route('jobpost.index')->with('success', 'job created successfully.');
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

        return redirect()->route('jobpost.index')->with('success', 'Job updated successfully.');
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

        return redirect()->route('jobpost.index')->with('success', 'Job deleted successfully.');
    }


    public function apply(Request $request, $id)
    {
        if(auth()->user()->role !== 'jobseeker')
        {
            return redirect()->back()->with('error', ' Only jobseekers can apply  for jobs.');
        }

        $jobpost=JobPost::findOrFail($id);



        if($jobpost->applications()->where('user_id', auth()->id())->exists()){
            return redirect()->back()->with('error', 'You have already applied for this job');
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

        return redirect()->back()->with('success', 'Your application has been submitted successfully');



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

    public function approve($id)
    {
        if(auth()->user()->role !=='admin')
        {
            abort(403, 'Unauthorized action.');
        }

        $jobpost=JobPost::findOrFail($id);

        $jobpost->update(['status'=>'承認']);

          // Optional: Notify the company that their post was approved
    // You can implement notification logic here


        return redirect()->back()->with('success','求人投稿が正常に承認されました。');
    }


    public function reject(Request $request,$id)
    {
        if(auth()->user()->role !=='admin')
        {
            abort(403, 'Unauthorized action');
        }
     $jobpost=JobPost::findOrFail($id);
     $jobpost->update([
        'status'=>'拒否'
     ]);

     return redirect()->back()->with('success','求人投稿は拒否されました。');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */



}
