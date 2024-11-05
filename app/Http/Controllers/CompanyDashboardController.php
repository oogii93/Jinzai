<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user()->load('jobPosts'); // Eager loading jobPosts relationship
        $jobposts = $user->jobPosts;

        return view('company.dashboard', compact('user', 'jobposts'));
    }



}
