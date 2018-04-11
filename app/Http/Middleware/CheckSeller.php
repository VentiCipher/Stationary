<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckSeller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        if (Auth::check() && ($request->user()->roles == "seller" || $request->user()->roles == "admin"))
            return $next($request);


        return redirect('/');
    }
}
