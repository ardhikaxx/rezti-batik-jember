<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotPembeli
{
    public function handle(Request $request, Closure $next, $guard = 'pembeli')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect()->route('pembeli.login');
        }

        return $next($request);
    }
}