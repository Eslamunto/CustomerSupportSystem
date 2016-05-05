<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth as Auth;

class AgentMiddleware
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
        if(!Auth::guest() && (Auth::user()->role == 2 || Auth::user()->role == 1 || Auth::user()->role == 0)){
            return $next($request);
        }else {
            //return redirect('/');
            return response('unauthorized', 401);
        }
    }
}
