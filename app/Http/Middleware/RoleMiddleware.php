<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $parsedRoles = [];
        foreach ($roles as $role) {
            $parsedRoles = array_merge($parsedRoles, explode(',', $role));
        }

        $parsedRoles = array_map(fn($r) => strtolower(trim($r)), $parsedRoles);

        $userRole = strtolower(trim(auth()->user()->role));

        if (!in_array($userRole, $parsedRoles)) {
            abort(403);
        }

        return $next($request);
    }
}
