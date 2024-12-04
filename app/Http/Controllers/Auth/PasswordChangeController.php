<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class PasswordChangeController extends Controller
{
    public function showChangeForm()
    {
        return view('auth.change-password');
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = auth()->user();

        // Verify current password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => '提供されたパスワードは当社の記録と一致しません。']);
        }

        $user->update([
            'password' => Hash::make($request->password),
            'is_temporary_password' => false,
        ]);

        return redirect()->route('dashboard')
            ->with('status', 'パスワードが正常に変更されました!');
    }
}
