<?php

use App\Http\Controllers\EstudioController;
use App\Http\Controllers\PdfViewerController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/estudios/{id}/pdf', [EstudioController::class, 'verPdf'])
    ->middleware('auth')
    ->name('estudios.pdf');

Route::get('/visor-pdf/{id}', [PdfViewerController::class, 'show'])
    ->middleware('auth')
    ->name('visor.pdf');