<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;

class NotVerified
{
    public function handle(Request $request, Closure $next)
    {
        return $request->user()?->hasVerifiedEmail() ? redirect(RouteServiceProvider::HOME) : $next($request);
    }
}
