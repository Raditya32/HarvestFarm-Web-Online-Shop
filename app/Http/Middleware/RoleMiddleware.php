<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
   public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // Cek apakah role user termasuk dalam array role yg diizinkan
        if (!in_array($user->role, $roles)) {
            return abort(403, 'Akses ditolak.');
        }

        return $next($request);
    }
}
