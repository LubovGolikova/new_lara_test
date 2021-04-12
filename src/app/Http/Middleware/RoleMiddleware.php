<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = \Auth::user();

        if (!$user->hasRole($role)) {
            return response()->json(['role' => 'Role has not permissions']);
        }

        return $next($request);
    }
}
