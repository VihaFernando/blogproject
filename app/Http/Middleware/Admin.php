<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->type === 'admin') {
            return $next($request);
        }

        return redirect('/home'); // Redirect non-admin users
    }
}

