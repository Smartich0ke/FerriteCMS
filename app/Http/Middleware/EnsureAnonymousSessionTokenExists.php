<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class EnsureAnonymousSessionTokenExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the 'anonymous_session' cookie exists
        if (!$request->hasCookie('anonymous_session')) {
            // If it doesn't, generate a new 'anonymous_session' and set it as a cookie
            $likeToken = Str::uuid();
            $cookie = cookie('anonymous_session', $likeToken, 60 * 24 * 365);  // This cookie will last 1 year
            Cookie::queue($cookie);
        }

        return $next($request);
    }
}
