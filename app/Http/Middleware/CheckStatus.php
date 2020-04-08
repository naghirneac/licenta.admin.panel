<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckStatus
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
        //Verifies if user is user & is admin
        if (Auth::user() && Auth::user()->isAdministrator()){
            return $next($request);
        } else {
            return redirect('/');
        }
    }
}
