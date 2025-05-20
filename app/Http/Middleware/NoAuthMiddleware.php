<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class NoAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        if (session()->get('isLoggedIn')) {
            return redirect('/dashboard');
        }
        return $next($request);
    }
}
