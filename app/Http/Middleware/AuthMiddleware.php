<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect('/login');
        }
        return $next($request);
    }
}
