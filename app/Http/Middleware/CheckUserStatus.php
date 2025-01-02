<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && (Auth::user()->status === 'activo')) {
            return $next($request);
            }
            return redirect()->route('inactive')->with('error', 'No esta activo en el sistema.');
    
    }
}
