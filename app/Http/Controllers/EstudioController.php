<?php

namespace App\Http\Controllers;

use App\Models\Estudio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EstudioController extends Controller
{
    public function verPdf($id)
    {
        $estudio = Estudio::findOrFail($id);

        $path = $estudio->pdf; // el campo donde guardás la ruta

        if (!Storage::disk('local')->exists($path)) {
            abort(404, 'Archivo no encontrado');
        }

        if (request()->boolean('download')) {
            // Si el usuario autenticado es paciente, incrementamos el contador de descargas
            if (auth()->guard('paciente')->check()) {
                $estudio->increment('descargas');
            }
            return Storage::disk('local')->download($path, 'estudio-'.$id.'.pdf', [
                'Content-Type' => 'application/pdf',
            ]);
        }

        $headers = [
            'Content-Type'            => 'application/pdf',
            'Content-Disposition'     => 'inline; filename="estudio.pdf"',
            // Removemos las restricciones que impiden mostrar el PDF en iframes
            // 'X-Frame-Options'         => 'SAMEORIGIN',
            // 'Content-Security-Policy' => "frame-ancestors 'self'",
        ];

        return response()->file(Storage::disk('local')->path($path), $headers);
    }
}
