<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Periksa apakah pengguna telah login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Periksa apakah peran pengguna ada dalam daftar peran yang diizinkan
        $user = Auth::user();
        if (!in_array($user->level, $roles)) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
