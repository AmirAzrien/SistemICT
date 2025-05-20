<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminJabatanAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->type !== 3) { // 3 = Admin
            abort(403, 'Unauthorized access.');
        }
        return $next($request);

        // if (auth()->user()->type != 3) {
        //     abort(403, 'Unauthorized access.');
        // }
        // return $next($request);
    }
}
