<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;

class SuperAdmin
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

        if(Auth::check() && Auth::user()->isSuperAdmin()){
            return $next($request);    
        }
        
        return redirect('explore');

    }
}
