<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotPaciente
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Excluir rutas de autenticación para evitar bucles
        if ($request->is('login') || $request->is('logout')) {
            return $next($request);
        }

        // Si no está autenticado, redirigir al login
        if (!Auth::guard('paciente')->check()) {
            return redirect()->route('filament.pacientes.auth.login');
        }

        return $next($request);
    }
}
