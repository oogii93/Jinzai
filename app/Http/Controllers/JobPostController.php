<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JobPostController extends Controller
{

    use AuthorizesRequests;



    public function index()
    {
        // For admin, show all posts
        if (auth()->user()->role === 'admin') {
            $jobpost = JobPost::all();
        }
        // For company, show only their posts
        elseif (auth()->user()->role === 'company') {
            $jobpost = JobPost::where('user_id', auth()->id())->get();
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
        return view('jobpost.create', compact('categories'));
    }

    public function show(string $id)
    {
        $jobpost = JobPost::findOrFail($id);


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



        $validatedData = $request->validate([
            'title' => 'required',
            'salary' => 'required',
            'working_hour'=>'required',
            'working_location'=>'required',
            'job_detail'=>'required',
            'qualification'=>'required',
            'other'=>'nullable',
            'category_id' => 'required|exists:categories,id',

        ]);

        $jobpost=new JobPost;
        $jobpost->title=$validatedData['title'];
        $jobpost->salary=$validatedData['salary'];
        $jobpost->working_hour=$validatedData['working_hour'];
        $jobpost->working_location=$validatedData['working_location'];
        $jobpost->job_detail=$validatedData['job_detail'];
        $jobpost->qualification=$validatedData['qualification'];
        $jobpost->other=$validatedData['other'];
        $jobpost->category_id=$validatedData['category_id'];
        $jobpost->user_id=Auth::id();
        $jobpost->save();



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



    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */



}
