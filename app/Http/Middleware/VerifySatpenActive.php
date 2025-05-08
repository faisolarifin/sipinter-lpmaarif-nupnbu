<?php

namespace App\Http\Middleware;

use App\Models\Satpen;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifySatpenActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $satpen = Satpen::select(["id_user","status"])
            ->where('id_user', '=', auth()->user()->id_user)
            ->first();

        if (in_array(auth()->user()->role, ["admin wilayah", "admin cabang"])) return $next($request);
        
        if ('setujui' != $satpen->status)
        {
            if ($request->segment(1) == 'oss') return redirect()->route('oss.403');
            elseif ($request->segment(1) == 'bhpnu') return redirect()->route('bhpnu.403');
            else return 0;
        }

        return $next($request);
    }
}
