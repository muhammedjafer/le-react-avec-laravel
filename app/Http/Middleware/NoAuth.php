<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NoAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        if ($request->is('api/*') && auth('sanctum')->check()) {
            return response()->streamJson(['message' => 'Access denied'], 403);
        }
    
        if (!$request->is('api/*')) {
            return (new RedirectIfAuthenticated())->handle($request, $next, ...$guards);
        }
    
        return $next($request);
    }
}