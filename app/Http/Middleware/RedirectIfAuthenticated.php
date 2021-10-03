<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        // $guards = empty($guards) ? [null] : $guards;

        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         return redirect(RouteServiceProvider::HOME);
        //     }
        // }

            if($request->is('merchant/*')){
                if (Auth::guard('marchant')->check()) {
                    return redirect('/merchant/home');
                }
            } elseif(Auth::guard('admin')->check()){
                return redirect(RouteServiceProvider::ADMIN);
            } elseif(Auth::guard('web')->check()){
                return redirect(RouteServiceProvider::HOME);
            }

        return $next($request);
    }
}
