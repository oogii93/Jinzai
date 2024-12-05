<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class JobseekerApproval
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $user=Auth::user();

        if($user->role ==='company'){
            return redirect()->back()
                    ->with('error', 'このページにアクセスする権限がありません。');
        }


           // Allow admin access unconditionally
           if ($user->role === 'admin') {
            return $next($request);
        }



        // if($user->role !=='jobseeker'){
        //     return $next($request);
        // }

        if (!$user->admin_check_approve) {
            return redirect()->back()
                ->with('error', '
キャリアサポーターが承認中です。しばらくお待ちください。承認後、求人票閲覧可能です。');
        }

        return $next($request);
    }
}
