<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // Jika belum login, paksa ke login
        }

        // Jika user bukan admin, tolak akses
        if (!Auth::user()->isAdmin()) { // Menggunakan helper method isAdmin()
            return redirect('/dashboard')->with('error', 'Akses Ditolak: Anda tidak memiliki izin Administrator.');
        }

        return $next($request);
    }
}
