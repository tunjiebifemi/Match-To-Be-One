<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Banned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (auth()->check() && auth()->user()->banned) {
            
            auth()->logout();
            
            return redirect()->route('login')->with('banned_error', 'Your account has been banned. Please contact the support team.');
        }

        return $next($request);
    }
}
