<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if (($role == 'superadmin' && $user->role_id === 1) ||
                ($role == 'admin' && $user->role_id === 2) ||
                ($role == 'staff' && $user->role_id === 3)) {
                return $next($request);
            }
        }
    
        // Redirect to unauthorized page if role doesn't match
        return redirect('/unauthorized');
    }
    
}
