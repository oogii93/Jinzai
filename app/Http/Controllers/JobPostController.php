<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobPostController extends Controller
{
    public function index()
    {

        $jobpost=JobPost::all();
        // dd($categories);

        return view('jobpost.index', compact('jobpost',));

    }

    public function create()
    {


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



    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */



}
