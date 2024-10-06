<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Check if the authenticated user's role matches the required role
        if (auth()->user()->role !== $role) {
            // Redirect the user if their role does not match
            return redirect('/');  // You can replace this with a "403 Forbidden" page or another route
        }

        // Allow the request to proceed if the role matches
        return $next($request);
    }
}
