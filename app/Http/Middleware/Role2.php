<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Role2
{
 
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role=='user2'){
            return $next($request);
        }
        return redirect ('/home');
    }
}
