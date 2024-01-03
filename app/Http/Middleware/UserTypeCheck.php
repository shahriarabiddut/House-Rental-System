<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserTypeCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $userType)
    {
        // Check if the authenticated user has the specified user type
        if (Auth::check() && Auth::user()->type == $userType) {
            return $next($request);
        }

        // Redirect or respond accordingly if the user type check fails
        return redirect()->route('root')->with('error', 'Unauthorized access');
    }
}
