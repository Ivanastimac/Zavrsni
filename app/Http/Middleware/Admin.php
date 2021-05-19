<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Admin
{

    public function handle($request, Closure $next)
    {
        if (Auth::user()->permission == 'admin') {
            return $next($request);
        }

        return redirect()->route('login'); // If user is not an admin.
    }
}

