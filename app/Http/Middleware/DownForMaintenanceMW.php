<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DownForMaintenanceMW
{
    /**
     * Handle an incoming request.
     */protected $allowedPaths = [
        'maintenance',
        'login',
        'css',
        'js',
        'image',
        'fonts',
        'api',
        'assets'
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
{
    if (app()->environment('local')) {
        if (!in_array($request->segment(1), $this->allowedPaths)) {
            return redirect('/maintenance');
        }
    }


    return $next($request);
}

}
