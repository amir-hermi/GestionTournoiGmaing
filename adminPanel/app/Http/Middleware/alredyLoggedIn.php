<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class alredyLoggedIn
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
        if(session()->has('LoggedAdmin') && url('/') == $request->url()){
            return redirect('/tournaments');
        }
        return $next($request);
    }
}
