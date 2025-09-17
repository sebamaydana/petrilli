<?php

use App\Http\Controllers\EstudioController;
use App\Http\Controllers\PdfViewerController;
use App\Http\Controllers\WebController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::domain('petrillilab.local')->group(function () {
    Route::get('/', [WebController::class, 'index'])->name('web.inicio');
    Route::get('/nosotros', [WebController::class, 'nosotros'])->name('web.nosotros');
    Route::get('/instructivos', [WebController::class, 'instructivos'])->name('web.instructivos');
    Route::get('/actualidad', [WebController::class, 'actualidad'])->name('web.actualidad');
    Route::get('/contacto', [WebController::class, 'contacto'])->name('web.contacto');
    Route::get('/noticia/{id}', [WebController::class, 'noticia'])->name('web.noticia');
});

Route::domain('pacientes.petrillilab.local')->group(function () {
    Route::get('/', \App\Filament\Pacientes\Pages\Auth\Login::class)->name('filament.pacientes.auth.login');
    Route::get('/pacientes/estudios/{id}/pdf', [EstudioController::class, 'verPdf'])
    ->middleware('auth:paciente')
    ->name('pacientes.estudios.pdf');

    Route::get('/pacientes/visor-pdf/{id}', [PdfViewerController::class, 'show'])
    ->middleware('auth:paciente')
    ->name('pacientes.visor.pdf');
});

Route::get('/migrar-estudios', [EstudioController::class, 'migrar_estudios']);

Route::get('/estudios/{id}/pdf', [EstudioController::class, 'verPdf'])
    ->middleware('auth')
    ->name('estudios.pdf');

Route::get('/visor-pdf/{id}', [PdfViewerController::class, 'show'])
    ->middleware('auth')
    ->name('visor.pdf');

