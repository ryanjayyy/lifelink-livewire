<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            $user = auth()->user();
            if ($user->role_id === 1 && !$request->routeIs('admin.dashboard.dashboard')) {
                return redirect()->route('admin.dashboard.dashboard');
            } elseif ($user->role_id === 2 && !$request->routeIs('members.dashboard.dashboard')) {
                return redirect()->route('members.dashboard.dashboard');
            }
        }
        return $next($request);
    }
}
