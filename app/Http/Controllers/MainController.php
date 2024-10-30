<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\JobPost;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        $jobpost = JobPost::with(['category', 'user'])  // Add user to eager loading
            ->latest()
            ->get();

        return view('main', compact('categories', 'jobpost'));
    }


//     public function showByCategory(Category $category)
// {
//     $categories = Category::all();
//     $posts = $category->posts()->paginate(8); // Paginate the posts
//     return view('posts.index', compact('posts', 'categories'));
// }



}
