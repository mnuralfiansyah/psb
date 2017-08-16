<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //if (Auth::guard($guard)->check()) {
            //return redirect('/home');
        //}
		
		if (Auth::guard('siswa')->check()) {
            return redirect('/siswa');
        }
		
		
		if (Auth::guard('guru')->check()) {
            return redirect('/guru');
        }
		
		if (Auth::guard('calonsiswa')->check()) {
            return redirect('/calonsiswa');
        }

        return $next($request);
    }
}
