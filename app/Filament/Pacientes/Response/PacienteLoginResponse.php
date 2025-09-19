<?php
namespace App\Filament\Pacientes\Response;

use Filament\Auth\Http\Responses\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Http\RedirectResponse;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

final class PacienteLoginResponse implements LoginResponseContract
{
    public function toResponse($request): \Illuminate\Http\RedirectResponse
    {
        // Base del panel (sin argumentos; NO pasar strings a getUrl())
        $base = \Filament\Facades\Filament::getPanel('pacientes')->getUrl();
        $url  = rtrim($base, '/') . '/pacientes';

        // Devuelve SIEMPRE un Illuminate\Http\RedirectResponse “puro”
        return new \Illuminate\Http\RedirectResponse($url, 302, []);
    }
}