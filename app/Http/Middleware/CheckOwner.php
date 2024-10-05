<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and their email matches the seeder user
        if (Auth::check() && Auth::user()->email === 'test@example.com') {
            return $next($request);
        }

        // If the user is not allowed, redirect or show an error message
        return redirect('/')->with('error', 'Unauthorized access');
    }
}
