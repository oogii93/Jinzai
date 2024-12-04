<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\JobSeekerApprovalStatusNotification;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // $users=User::where('role', 'jobseeker')
        //             ->with('videoProfile')
        //             ->latest()
        //             ->paginate(10);

        $query = User::where('role', 'jobseeker')->with('videoProfile');

        if($request->filled('search')){

            $searchTerm = $request->input('search');
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                  ->orWhere('email', 'like', "%{$searchTerm}%")
                  ->orWhere('phone_number', 'like', "%{$searchTerm}%");

            });
        }
        $users = $query->latest()->paginate(10);

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

    public function approve(User $user)
    {
         // Ensure only an admin can do this
         if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action');
        }

        $user->update([
            'admin_check_approve'=>true,
            'status'=>'approved'
        ]);

        $user->notify(new JobSeekerApprovalStatusNotification(
            true,
            auth()->user()->name
        ));
        return redirect()->route('admin.user.index')->with('success','求職者アカウントが承認されました。');
    }


    public function disapprove(User $user)
    {
        // Ensure only an admin can do this
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action');
        }

        // Mark as disapproved instead of deleting
        $user->update([
            'admin_check_approve' => false,
            'status' => 'disapproved' // Assuming you add a status column
        ]);

          // Send notification to the user
    $user->notify(new JobSeekerApprovalStatusNotification(
        false,
        auth()->user()->name
    ));

        return redirect()->route('admin.user.index')
            ->with('success', '求職者アカウントが承認されませんでした');
    }



}
