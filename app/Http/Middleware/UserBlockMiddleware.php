<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserBlockMiddleware
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

        if (Auth::check() && Auth::guard('api')->user()->is_block == 0) {

            return response()->json(['message' => 'Your account has been Banned. Please contact administrator.', 'success' => false], 401);
        }
        return $next($request);
    }
}
