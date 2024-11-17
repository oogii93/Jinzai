<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\JobPost;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::get();

        $tags=Tag::get();

        $user=Auth::user();


            if ($user->role === 'admin') {
                // Admin can see all non-admin users
                $users = User::where('role', '!=', 'admin')->get();
            } else {
                // Non-admin users can only see admins
                $users = User::where('role', 'admin')->get();
            }


        $query=JobPost::with(['category', 'user','tags']);

           // Add tag filter
    if ($request->has('tag')) {
        $query->whereHas('tags', function($q) use ($request) {
            $q->where('tags.id', $request->tag);
        });
    }


        // $jobpost = JobPost::with(['category', 'user'])  // Add user to eager loading
        //     ->latest()
        //     ->get();

        $searchQuery= $request->input('search');
        if($searchQuery){
            $query->where(function ($q) use ($searchQuery){
                $q->where('title', 'like', '%' .$searchQuery . '%')
                ->orWhere('salary', 'like', '%' .$searchQuery . '%')
                ->orWhere('working_location', 'like', '%' .$searchQuery . '%')
                ->orWhere('working_hour', 'like', '%'. $searchQuery . '%')
                ->orWhere('qualification', 'like', 'like', '%' .$searchQuery .'%');

            });
        }

        if($request->has('category')){
            $query->where('category_id', $request->category);
        }

        $jobposts = $query->latest()->paginate(5); // Changed variable name to plural
        // dd($jobposts);

        if($request->ajax()){
            return view('partials.job-listings', compact('jobposts'));
        }


        return view('main', compact('categories', 'jobposts','tags','users'));
    }


    public function filterByCategory(Category $category)
    {
        $categories=Category::get();
        $tags=Tag::get();

        $jobposts=JobPost::where('category_id', $category->id)
                            ->with(['category','user','tags'])
                            ->latest()
                            ->paginate(5);
                        return view('main', compact('categories', 'category', 'tags', 'jobposts'));
    }

    public function filterByTag(Tag $tag)
    {
        $categories=Category::get();

        $tags=Tag::get();
        $jobposts=JobPost::whereHas('tags', function ($query) use ($tag){
            $query->where('tags.id', $tag->id);
        })->with(['category','user','tags'])
        ->latest()
        ->paginate(5);

        return view('main', compact('categories','jobposts','tags','tag'));
    }


    public function getPostsByTag(Tag $tag)
    {
        $jobposts=JobPost::whereHas('tags', function ($query) use ($tag){
            $query->where('tags.id', $tag->id);

        })->with(['category', 'user','tags'])->latest()->paginate(5);

        $categories=Category::get();
        $tags = Tag::get();

        return view('main',compact('jobposts', 'categories','tags'));
    }


//     public function showByCategory(Category $category)
// {
//     $categories = Category::all();
//     $posts = $category->posts()->paginate(8); // Paginate the posts
//     return view('posts.index', compact('posts', 'categories'));
// }

public function getJobPostByCategory(Category $category)
{
    $category=Category::get();
    $tags=Tag::get();

    $jobposts=JobPost::with(['category', 'user', 'tags'])
                        ->where('category_id', $category->id)
                        ->latest()
                        ->paginate(5);

                        return view ('main', compact('category', 'jobposts', 'tags', 'categories'));
}


}
