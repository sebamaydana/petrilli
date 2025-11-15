<?php

namespace App\Http\Controllers;

use App\Models\Estudio;
use App\Models\Instructivo;
use App\Models\Noticia;
use App\Models\Turno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class WebController extends Controller
{
    public function index()
    {
        $noticias = Noticia::where('estado', 'activo')->orderBy('fecha', 'desc')->limit(3)->get();
        return view('web.inicio', compact('noticias'));
    }

    public function nosotros(){
        $noticias = Noticia::where('estado', 'activo')->orderBy('fecha', 'desc')->limit(3)->get();
        return view('web.nosotros', compact('noticias'));
    }

    public function instructivos(){
        $noticias = Noticia::where('estado', 'activo')->orderBy('fecha', 'desc')->limit(3)->get();
        $instructivos = Instructivo::where('estado', 'activo')->orderBy('orden', 'asc')->get();
        return view('web.instructivos', compact('noticias', 'instructivos'));
    }

    public function actualidad(){
        $noticias = Noticia::where('estado', 'activo')->orderBy('fecha', 'desc')->get();
        return view('web.actualidad', compact('noticias'));
    }

    public function noticia($id = 0){
        $noticia = Noticia::find($id);
        if(!$noticia){
            return redirect()->route('web.actualidad');
        }
        return view('web.noticia', compact('noticia'));
    }

    public function contacto(){
        $noticias = Noticia::where('estado', 'activo')->orderBy('fecha', 'desc')->limit(3)->get();
        return view('web.contacto', compact('noticias'));
    }

    public function verPdfPublic(string $token)
    {
        $estudio = Estudio::where('public_token', $token)->firstOrFail();

        $path = $estudio->pdf;

        if (!Storage::disk('local')->exists($path)) {
            abort(404, 'Archivo no encontrado');
        }

        if (request()->boolean('download')) {
            return response()->download(
                Storage::disk('local')->path($path),
                'estudio-'.$estudio->id.'.pdf',
                ['Content-Type' => 'application/pdf']
            );
        }

        $headers = [
            'Content-Type'        => 'application/pdf',
            'Content-Disposition' => 'inline; filename="estudio.pdf"',
        ];

        return response()->file(Storage::disk('local')->path($path), $headers);
    }

    public function turnos()
    {
        $noticias = Noticia::where('estado', 'activo')->orderBy('fecha', 'desc')->limit(3)->get();
        $turnosDisponibles = Turno::query()
            ->where('estado', 'libre')
            ->where('inicio', '>=', now())
            ->orderBy('inicio')
            ->get();

        return view('web.turnos', compact('noticias', 'turnosDisponibles'));
    }

    public function reservarTurno(Request $request)
    {
        $data = $request->validate([
            'turno_id' => [
                'required',
                'integer',
                Rule::exists('turnos', 'id')->where(fn ($query) => $query
                    ->where('estado', 'libre')
                    ->where('inicio', '>=', now())),
            ],
            'nombre' => ['required', 'string', 'max:255'],
            'dni' => ['nullable', 'string', 'max:50'],
            'correo' => ['required', 'email', 'max:255'],
            'celular' => ['required', 'string', 'max:50'],
            'comentario' => ['nullable', 'string', 'max:1000'],
        ], [
            'turno_id.required' => 'Seleccioná un turno disponible.',
            'turno_id.exists' => 'El turno seleccionado ya no está disponible.',
            'nombre.required' => 'Ingresá tu nombre completo.',
            'correo.required' => 'Ingresá tu correo electrónico.',
            'correo.email' => 'El correo electrónico no es válido.',
            'celular.required' => 'Ingresá un número de contacto.',
        ]);

        DB::transaction(function () use ($data) {
            $turno = Turno::lockForUpdate()->find($data['turno_id']);

            if (! $turno || $turno->estado !== 'libre') {
                throw ValidationException::withMessages([
                    'turno_id' => 'El turno elegido ya no está disponible. Seleccioná otro horario.',
                ]);
            }

            $turno->update([
                'nombre' => $data['nombre'],
                'dni' => $data['dni'] ?? null,
                'correo' => $data['correo'],
                'celular' => $data['celular'],
                'comentario' => $data['comentario'] ?? null,
                'estado' => 'pendiente',
            ]);
        });

        return redirect()
            ->route('web.turnos')
            ->with('status', '¡Listo! Reservamos tu turno. Te contactaremos para confirmar los detalles.');
    }
}
