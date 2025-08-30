<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre',
        'email',
        'dni',
        'password',
        'estado',
    ];

    protected $hidden = ['password'];

    protected $casts = [
        // Laravel 11: casteo "hashed" para que se encripte solo en create/update
        'password' => 'hashed',
        'estado' => 'string',
    ];

    // Si querés forzar que el "username" sea dni
    public function getAuthIdentifierName()
    {
        return 'dni';
    }
}
