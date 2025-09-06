<?php

namespace App\Http\Controllers;

use App\Models\Estudio;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function migrar_estudios() {
        // Realizamos la consulta en crudo utilizando el query builder de Laravel
        $resultados = collect(DB::select("
            SELECT u.id, u.nombre, u.id_empleado, ed.id_estudio, ed.localizacion 
            FROM sinsys_usuario as u 
            LEFT JOIN estudio as e ON e.id_persona = u.id_empleado 
            LEFT JOIN estudio_doc as ed ON ed.id_estudio = e.id 
            ORDER BY u.nombre ASC
        "))->whereNotNull('id_estudio')->values();

        $estudiosCreados = [];
        $errores = [];

        foreach ($resultados as $resultado) {
            try {
                // Buscar el paciente por nombre y DNI (asumiendo que id_empleado es el DNI)
                $paciente = Paciente::where('dni', $resultado->nombre)
                                  ->first();

                if (!$paciente) {
                    $errores[] = "Paciente no encontrado: {$resultado->nombre} (DNI: {$resultado->id_empleado})";
                    continue;
                }

                // Extraer la última parte de la localización (nombre del PDF)
                $localizacion = $resultado->localizacion;
                $nombrePdf = basename($localizacion); // Obtiene solo el nombre del archivo
                
                // Crear la ruta del PDF con /estudios
                $rutaPdf = 'estudios/' . $nombrePdf;

                // Crear el estudio
                $estudio = Estudio::create([
                    'paciente_id' => $paciente->id,
                    'descripcion' => '-',
                    'pdf' => $rutaPdf,
                    'estado_id' => 2, // Asumiendo que 1 es el estado por defecto
                    'descargas' => 0
                ]);

                $estudiosCreados[] = [
                    'estudio_id' => $estudio->id,
                    'paciente' => $paciente->nombre,
                    'dni' => $paciente->dni,
                    'pdf' => $rutaPdf,
                    'localizacion_original' => $localizacion
                ];

            } catch (\Exception $e) {
                $errores[] = "Error al crear estudio para {$resultado->nombre}: " . $e->getMessage();
            }
        }

        return response()->json([
            'estudios_creados' => $estudiosCreados,
            'total_creados' => count($estudiosCreados),
            'errores' => $errores,
            'total_errores' => count($errores)
        ]);
    }
}
