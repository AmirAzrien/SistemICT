<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminJabatanOrSuperAdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        // if (auth()->check() && in_array(auth()->user()->type, [3, 4])) {
        if (auth()->check() && in_array(auth()->user()->type, [2, 3, 4])) {
            return $next($request);
        }

        abort(403, 'Unauthorized access.');
    }
}
