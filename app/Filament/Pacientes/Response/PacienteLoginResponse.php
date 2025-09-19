<?php
namespace App\Filament\Pacientes\Response;

use Filament\Auth\Http\Responses\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Http\RedirectResponse;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\URL;

class PacienteLoginResponse implements LoginResponseContract
{
    public function toResponse($request): RedirectResponse
    {
        // Si /pacientes vive en el MISMO dominio del panel (p.ej. pacientes.petrillilab.local/pacientes):
        $url = URL::to('/pacientes');        
        return new RedirectResponse($url);

        // ⬇️ Si necesitás cruzar de dominio (p.ej. a sistema.petrillilab.local/pacientes), usá una URL absoluta:
        // return new RedirectResponse('https://sistema.petrillilab.local/pacientes');

        // ⬇️ Alternativa segura si tenés una ruta con dominio configurado:
        // return new RedirectResponse(route('pacientes.home')); // La ruta debe generar URL absoluta al dominio correcto.
    }
}