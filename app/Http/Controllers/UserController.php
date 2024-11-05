<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users=User::where('role', 'jobseeker')
                    ->with('videoProfile')
                    ->latest()
                    ->paginate(10);

        // dd($users);

        return view('admin.user.index', compact('users'));
    }


    public function show(string $id)
    {
        $user=User::findOrFail($id);

        return view('admin.user.show' ,compact('user'));
    }

    public function company()
    {
        $users=User::where('role', 'company')
                    ->latest()
                    ->paginate(10);

                    return view('admin.company.index', compact('users'));

    }

    public function companyShow(string $id)
    {
        $user=User::findOrFail($id);

        return view('admin.company.show' ,compact('user'));
    }



}
