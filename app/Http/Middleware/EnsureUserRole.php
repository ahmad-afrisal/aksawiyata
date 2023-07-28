<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class EnsureUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $user = Auth::user();
        // return $role;
        if(($role == 'admin' && $user->role_id == 1) || ($role == 'user' && $user->role_id == 4) || ($role == 'lecture' && $user->role_id == 2) || ($role == 'mentor' && $user->role_id == 3) ) {
            return $next($request);
        }
        abort(403, 'Unauthorized');

    }
}
