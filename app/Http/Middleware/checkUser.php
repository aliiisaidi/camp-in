<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkUser
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
        if (Auth::check() && !Auth::user()->admin == 1) {
            return $next($request);
        } else if (Auth::check() && Auth::user()->admin == 1) {
            return redirect('administration');
        } else {
            return redirect('/');
        }
    }
}