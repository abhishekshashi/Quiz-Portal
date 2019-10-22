<?php

namespace App\Http\Middleware;

use Closure;

class UserMember
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
                if ($request->user() && $request->user()->admin != 0)
            {
                return redirect()->route('login.custom');
            }
                return $next($request);
            }
}
