<?php

namespace App\Http\Controllers;

use App\Models\Estudio;
use Illuminate\Http\Request;

class PdfViewerController extends Controller
{
    public function show($id)
    {
        $estudio = Estudio::findOrFail($id);

        // URL al endpoint que sirve el PDF (mismo origen)
        $fileUrl = route('estudios.pdf', $id);

        return view('pdf.viewer', compact('fileUrl', 'estudio'));
    }
}
