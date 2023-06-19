<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MustLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user() !== NULL && in_array(auth()->user()->role, ['operator', 'admin'])) {
            return $next($request);
        }
        return redirect()->route('login')->with('error', 'silahkan login terlebih dahulu');
    }
}
