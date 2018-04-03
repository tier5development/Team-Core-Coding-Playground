<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UnauthorizedUser
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
        if(!Auth::check()){
            return redirect('/login')->with(['success' => false, 'message' => "You have to login before accessing this page "]);
        }
        return $next($request);
    }
}
