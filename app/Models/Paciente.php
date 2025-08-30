<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class Paciente extends Authenticatable implements FilamentUser
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
        'password' => 'hashed',
        'estado' => 'string',
    ];

    // Método requerido por Filament para verificar acceso al panel
    public function canAccessPanel(Panel $panel): bool
    {
        return $panel->getId() === 'pacientes';
    }

    // Si querés forzar que el "username" sea dni
    public function getAuthIdentifierName()
    {
        return 'dni';
    }

    // Método para obtener el nombre del usuario en Filament
    public function getFilamentName(): string
    {
        return $this->nombre;
    }
}
