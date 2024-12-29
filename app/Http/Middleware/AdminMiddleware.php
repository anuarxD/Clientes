<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Verificar si el usuario está autenticado y tiene el rol de Administrador
        if (Auth::check() && (Auth::user()->role === 'Administrador' || Auth::user()->role === 'Super Admin')) {
            return $next($request);
        }

        // Redirigir a Dashboard si no es Administrador
        return redirect()->route('home')->with('error', 'No tienes acceso a esta sección.');
    }
}
