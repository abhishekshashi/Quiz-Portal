<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!(Auth::user() &&  (Auth::user()->isVerified == 1)) )
        {
            
            return redirect()->route('login.custom');
        }
        
    }
}
