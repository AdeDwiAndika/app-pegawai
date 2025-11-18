<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PegawaiMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role === 'pegawai') {
            abort(403, 'Akses khusus pegawai.');
        }

        return $next($request);
    }
}