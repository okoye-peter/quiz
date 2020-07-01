<?php

namespace App\Http\Middleware;

use Closure;

class AdminLogin
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
        $user  = \DB::table('users')->where('email', $request->email)->first();
        if ($user) {
            if($user->isadmin === 1){
                return $next($request);
            }
        }

        return abort(403);
    }
}
