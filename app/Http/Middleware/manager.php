<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Manager
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
           if (Auth::user()->hasRole('manager') ) {
             return $next($request);
            }
            else {
                return redirect('/');
            }              
        }

        return redirect('/');
    }
}
