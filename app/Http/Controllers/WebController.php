<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $noticias = Noticia::where('estado', 'activo')->get();
        return view('web.inicio', compact('noticias'));
    }

    public function nosotros(){
        return view('web.nosotros');
    }

    public function instructivos(){
        return view('web.instructivos');
    }

    public function actualidad(){
        return view('web.actualidad');
    }

    public function contacto(){
        return view('web.contacto');
    }
}
