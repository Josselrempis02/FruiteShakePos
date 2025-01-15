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

            
            $roleHierarchy = [
                'superadmin' => ['superadmin', 'admin', 'staff'],
                'admin' => ['admin', 'staff'],
                'staff' => ['staff'],
            ];

            $userRole = $user->role->name; 

            if (in_array($role, $roleHierarchy[$userRole] ?? [])) {
                return $next($request);
            }
        }

        session()->flash('alert', 'You do not have permission to access this page.');
        return redirect()->back();
    }

    
}
