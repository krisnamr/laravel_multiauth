<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Role1
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role=='user1'){
            return $next($request);
        }elseif (Auth::user()->role=='user2'){
            return redirect ('/user2');
        }
        return redirect ('/');
    }
}