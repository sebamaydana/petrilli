<?php

use App\Http\Controllers\EstudioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/estudios/{id}/pdf', [EstudioController::class, 'verPdf'])
    ->name('estudios.pdf')
    ->middleware('auth'); // o los middleware que correspondan