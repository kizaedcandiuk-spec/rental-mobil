<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user sudah login dan punya role 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Kalau bukan admin, tendang balik ke dashboard dalam aplikasi, bukan ke landing page awal luar
        return redirect('/dashboard')->with('error', 'Lu bukan admin, gak usah nekat masuk bro!');
    }
}