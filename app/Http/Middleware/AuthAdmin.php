<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->guard('user')->check() ) {
            if(auth()->user()->type == 'seller' || auth()->user()->type == 'admin' ) {
                return $next($request);
            }
        }
    
        return redirect('/login');

        return $next($request);
    }
}
