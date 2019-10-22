<?php

namespace App\Http\Middleware;

use Closure;
use User;
use Auth;

class checkuser
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
        if(Auth::user() &&  Auth::user()->admin == 1) 
        {
            return $next($request);
        }
        
    }
}
