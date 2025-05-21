<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionUserAccountMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Publicly accessible routes
        $openRoutes = [
            'login',
            'logout',
            'users/create',
            'users',
            'update-password',
        ];

        $path = ltrim($request->path(), '/'); // Normalize path (remove leading slash)

        if (!Session::has('user') && !in_array($path, $openRoutes)) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        return $next($request);
    }
}
