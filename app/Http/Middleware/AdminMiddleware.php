<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // kalau belum login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // kalau bukan admin
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Kamu bukan admin');
        }

        return $next($request);
    }
}