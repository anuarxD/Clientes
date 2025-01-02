<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PsychologistMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
        public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && (Auth::user()->role === 'Administrador' || Auth::user()->role === 'Super Admin' || Auth::user()->role === 'Psicologo')) {
        return $next($request);

        }
        return redirect()->route('home')->with('error', 'No tienes acceso a esta sección.');

    }
}
