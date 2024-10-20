<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // Assuming the role is stored in a 'role' column in the 'users' table.
        if ($user->role !== $role) {
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
