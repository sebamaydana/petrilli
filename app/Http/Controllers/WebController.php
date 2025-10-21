<?php

namespace App\Http\Controllers;

use App\Models\Estudio;
use App\Models\Instructivo;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
}
