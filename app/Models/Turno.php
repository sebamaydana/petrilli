<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turno extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'turnos';

    protected $fillable = [
        'inicio',
        'fin',
        'titulo',
        'nombre',
        'celular',
        'correo',
        'dni',
        'estado',
        'comentario',
    ];

    protected $casts = [
        'inicio' => 'datetime',
        'fin' => 'datetime',
    ];

    protected $attributes = [
        'estado' => 'libre',
    ];
}


