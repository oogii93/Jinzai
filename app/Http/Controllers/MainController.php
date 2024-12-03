<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\JobPost;
use App\Models\Category;
use App\Models\Category2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{


    //zadargaan ni neg private function zohiogood teriigee bvh filter deeree duudaj ajiluulahad orshine ingeseer method bolgon deeree
    // private functionoo duudaadal mash ih logic bolon code mor hemnej baina
    private function applyRoleBasedVisibility($query)
    {

        $user=Auth::user();

        if($user){
            switch ($user->role)
            {
                case 'admin':
                      // Admin can see all posts
                    break;
                      // Companies can see their own posts (regardless of status) and approved posts from other companies
                case 'company':
                    $query->where(function ($q) use($user){
                        $q->where('user_id', $user->id);
                        // ->orWhere('status', '承認');
                    });

                    break;
                case 'jobseeker':
                    $query->where('status', '承認');

                    break;

            }
        }

        return $query;

    }


    private function checkJobPostVisibility($jobposts)
    {
        $user=Auth::user();
        $invisiblePosts=[];

        if($user && in_array($user->role, ['admin', 'company'])){
            foreach($jobposts as $post)
            {
                if($post->status !=='承認')
                {
                    $invisiblePosts[]=$post;
                }
            }
        }

        return $invisiblePosts;
    }




    public function index(Request $request)
    {
        $categories = Category::with('subcategories')->get();
        $tags = Tag::get();
        $user = Auth::user();

        // Base query with relationships
        $query = JobPost::with(['category', 'user', 'tags']);

        // Role-based visibility logic
        // if ($user) {
        //     switch ($user->role) {
        //         case 'admin':
        //             // Admin can see all posts
        //             break;
        //         case 'company':
        //             // Companies can see their own posts (regardless of status) and approved posts from other companies
        //             $query->where(function ($q) use ($user) {
        //                 $q->where('user_id', $user->id)
        //                   ->orWhere('status', '承認');
        //             });
        //             break;
        //         case 'jobseeker':
        //             // Jobseekers can only see approved posts
        //             $query->where('status', '承認');
        //             break;
        //         default:
        //             // Guest users can only see approved posts
        //             $query->where('status', '承認');
        //             break;
        //     }
        // } else {
        //     // If no user is logged in, only show approved posts
        //     $query->where('status', '承認');
        // }

        $query=$this->applyRoleBasedVisibility($query);

        // Tag filter
        if ($request->has('tag')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('tags.id', $request->tag);
            });
        }

        // Search functionality
        $searchQuery = $request->input('search');
        if ($searchQuery) {
            $query->where(function ($q) use ($searchQuery) {
                $q->where('salary', 'like', '%' . $searchQuery . '%')
                    ->orWhere('title', 'like', '%' . $searchQuery . '%')

                  ->orWhere('working_location', 'like', '%' . $searchQuery . '%')
                  ->orWhere('working_hour', 'like', '%' . $searchQuery . '%')
                  ->orWhere('job_detail', 'like', '%' . $searchQuery . '%')
                  ->orWhere('other', 'like', '%' . $searchQuery . '%')
                  ->orWhere('company_name', 'like', '%' . $searchQuery . '%')
                  ->orWhere('company_furigana', 'like', '%' . $searchQuery . '%')
                  ->orWhere('company_address', 'like', '%' . $searchQuery . '%')
                  ->orWhere('type', 'like', '%' . $searchQuery . '%')
                  ->orWhere('my_car', 'like', '%' . $searchQuery . '%')
                  ->orWhere('trial_period', 'like', '%' . $searchQuery . '%')
                  ->orWhere('qualification', 'like', '%' . $searchQuery . '%');
            });
        }

        // Category filter
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        // Subcategory filter
        if ($request->has('subcategory')) {
            $query->where('category2_id', $request->subcategory);
        }

        // Get paginated results
        $jobposts = $query->latest()->paginate(5);

        $invisiblePosts=$this->checkJobPostVisibility($jobposts);



        // Handle AJAX requests
        if ($request->ajax()) {
            return view('partials.job-listings', compact('jobposts'));
        }

        // Get users based on role
        if ($user && $user->role === 'admin') {
            $users = User::where('role', '!=', 'admin')->get();
        } else {
            $users = User::where('role', 'admin')->get();
        }

        return view('main', compact('categories', 'jobposts', 'tags', 'users','invisiblePosts'));
    }


    // public function index(Request $request)
    // {
    //     $categories = Category::with('subcategories')->get();


    //     $tags = Tag::get();

    //     $user = Auth::user();

    //     $query = JobPost::with(['category', 'user', 'tags']);



    //     if ($user->role === 'admin') {
    //         // Admin can see all non-admin users
    //         $users = User::where('role', '!=', 'admin')->get();
    //     } else {
    //         // Non-admin users can only see admins
    //         $users = User::where('role', 'admin')->get();
    //     }



    //     if ($user) {
    //         if ($user->role === 'admin') {
    //         } elseif ($user->role === 'company') {
    //             $query->where(function ($q) use ($user) {
    //                 $q->where('user_id', $user->id)
    //                     ->orWhere('status', 'approved');
    //             });
    //         } else {
    //             $query->where('status', 'approved');
    //         }
    //     }

    //     // Add tag filter
    //     if ($request->has('tag')) {
    //         $query->whereHas('tags', function ($q) use ($request) {
    //             $q->where('tags.id', $request->tag);
    //         });
    //     }


    //     // $jobpost = JobPost::with(['category', 'user'])  // Add user to eager loading
    //     //     ->latest()
    //     //     ->get();

    //     $searchQuery = $request->input('search');
    //     if ($searchQuery) {
    //         $query->where(function ($q) use ($searchQuery) {
    //             $q->where('salary', 'like', '%' . $searchQuery . '%')
    //                 // ->orWhere('salary', 'like', '%' . $searchQuery . '%')
    //                 ->orWhere('working_location', 'like', '%' . $searchQuery . '%')
    //                 ->orWhere('working_hour', 'like', '%' . $searchQuery . '%')
    //                 ->orWhere('qualification', 'like', 'like', '%' . $searchQuery . '%');
    //         });
    //     }

    //     if ($request->has('category')) {
    //         $query->where('category_id', $request->category);
    //     }

    //     // Filter by subcategory if provided
    //     if ($request->has('subcategory')) {
    //         $query->where('category2_id', $request->subcategory);
    //     }

    //     $jobposts = $query->latest()->paginate(5); // Changed variable name to plural
    //     // dd($jobposts);

    //     if ($request->ajax()) {
    //         return view('partials.job-listings', compact('jobposts'));
    //     }


    //     return view('main', compact('categories', 'jobposts', 'tags', 'users'));
    // }


    public function filterByCategory(Category $category)
    {
        $categories = Category::get();
        $tags = Tag::get();
        $user=Auth::user();

        $query=JobPost::where('category_id', $category->id)
                        ->with(['category','user','tags']);

        $query=$this->applyRoleBasedVisibility($query);
        $jobposts=$query->latest()->paginate(5);
        $invisiblePosts=$this->checkJobPostVisibility($jobposts);

        // $jobposts = JobPost::where('category_id', $category->id)
        //     ->with(['category', 'user', 'tags'])
        //     ->latest()
        //     ->paginate(5);
        return view('main', compact('categories', 'category', 'tags', 'jobposts','invisiblePosts'));
    }

    public function filterByTag(Tag $tag)
    {
        $categories = Category::get();

        $tags = Tag::get();
        $user=Auth::user();


        $query = JobPost::whereHas('tags', function ($q) use ($tag) {
            $q->where('tags.id', $tag->id);
        })->with(['category', 'user', 'tags']);

        $query=$this->applyRoleBasedVisibility($query);

        $jobposts=$query->latest()->paginate(5);

        $invisiblePosts=$this->checkJobPostVisibility($jobposts);


        return view('main', compact('categories', 'jobposts', 'tags', 'tag','invisiblePosts'));
    }


    public function getPostsByTag(Tag $tag)
    {


        $categories = Category::get();
        $tags = Tag::get();
        $user=Auth::user();


        $query = JobPost::whereHas('tags', function ($q) use ($tag) {
            $q->where('tags.id', $tag->id);
        })->with(['category', 'user', 'tags']);
        $query=$this->applyRoleBasedVisibility($query);

        $jobposts=$query->latest()->paginate(5);

        $invisiblePosts=$this->checkJobPostVisibility($jobposts);


        return view('main', compact('jobposts', 'categories', 'tags','invisiblePosts'));
    }


    //     public function showByCategory(Category $category)
    // {
    //     $categories = Category::all();
    //     $posts = $category->posts()->paginate(8); // Paginate the posts
    //     return view('posts.index', compact('posts', 'categories'));
    // }

    public function getJobPostByCategory(Category $category)
    {
        $category = Category::get();
        $tags = Tag::get();

        $jobposts = JobPost::with(['category', 'user', 'tags'])
            ->where('category_id', $category->id)
            ->latest()
            ->paginate(5);

        return view('main', compact('category', 'jobposts', 'tags', 'categories'));
    }

    public function filterBySubcategory(Category $category, Category2 $subcategory)
    {
        $categories=Category::with('subcategories')->get();
        $tags=Tag::get();
        $user=Auth::user();

        if($user)
        {
            $users=$user->role ==='admin'
                ? User::where('role', '!=', 'admin')->get()
                : User::where('role', 'admin')->get();

        }

        $query=JobPost::where('category2_id', $subcategory->id)
                ->with(['category','user','tags']);

        $query=$this->applyRoleBasedVisibility($query);

        $jobposts=$query->latest()->paginate(5);

        $invisiblePosts=$this->checkJobPostVisibility($jobposts);

        return view('main', compact(
            'categories',
            'jobposts',
            'tags',
            'users',
            'category',
            'subcategory',
            'invisiblePosts'
        ));
    }

}
