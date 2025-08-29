<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nombre',
        'email',
        'dni',
        'password',
        'estado',
    ];

    protected $casts = [
        'estado' => 'string',
    ];
}
