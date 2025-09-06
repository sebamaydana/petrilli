<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        return view('web.inicio');
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
