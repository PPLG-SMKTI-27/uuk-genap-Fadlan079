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
    public function handle(Request $request, Closure $next, string $role)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $roles = array_map(fn($r) => strtolower(trim($r)), explode(',', $role));

        $userRole = strtolower(trim(auth()->user()->role));

        if (!in_array($userRole, $roles)) {
            abort(403);
        }

        return $next($request);
    }
}
