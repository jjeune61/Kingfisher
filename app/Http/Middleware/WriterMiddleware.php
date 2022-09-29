<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class WriterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(\Auth::check()){
            // Writer usertype = 3
        if(\Auth::user()->user_type == '3'){
            return $next($request);
        } else {
                return redirect('/')->with('message', 'Access Denied');
        }

    } else {

        return redirect('/login')->with('message', 'Access Denied');
    }

    return $next($request);
        
    }
}
