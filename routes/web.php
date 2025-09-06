<?php

use App\Http\Controllers\EstudioController;
use App\Http\Controllers\PdfViewerController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/migrar-estudios', [EstudioController::class, 'migrar_estudios']);

Route::get('/estudios/{id}/pdf', [EstudioController::class, 'verPdf'])
    ->middleware('auth')
    ->name('estudios.pdf');

Route::get('/visor-pdf/{id}', [PdfViewerController::class, 'show'])
    ->middleware('auth')
    ->name('visor.pdf');

Route::get('/pacientes/estudios/{id}/pdf', [EstudioController::class, 'verPdf'])
    ->middleware('auth:paciente')
    ->name('pacientes.estudios.pdf');

Route::get('/pacientes/visor-pdf/{id}', [PdfViewerController::class, 'show'])
    ->middleware('auth:paciente')
    ->name('pacientes.visor.pdf');