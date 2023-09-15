<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnlyOperator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->role == 'operator') {
            if (User::find(auth()->user()->id_user)->status == 'block') {
                return redirect()->route('login')->with('error', 'this account has blocked');
            }
            return $next($request);
        }
        return redirect()->route('login')->with('error', 'user tidak memiliki privilages');
    }
}
