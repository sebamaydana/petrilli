<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

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
        return view('web.instructivos', compact('noticias'));
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
}
