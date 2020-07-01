<?php

namespace App\Http\Middleware;

use Closure;

class AdminRoutes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->isadmin === 1) {
            return $next($request);
        }

        return abort(403);
    }
}
