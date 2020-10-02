<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class CheckLevel
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
        if ( Auth::check() )
        {
            if (Auth::user()->level != 'Admin') {
            return redirect('/');
            }
        }
        else{
            return redirect()->route('login');
        }

        return $next($request);
    }
}
