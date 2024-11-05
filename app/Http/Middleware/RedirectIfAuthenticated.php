<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $guards=empty($guards)? [null] : $guards;

        foreach($guards as $guard){
            if(Auth::guard($guard)->check()){
                $user=Auth::guard($guard)->user();

                if($user->role === 'jobseeker'){
                    return redirect()->route('jobseeker.dashboard');
                }elseif($user->role ==='company'){
                    return redirect()->route('company.dashboard');
                }
            }
        }
        return $next($request);
    }
}
