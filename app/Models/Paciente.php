<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Filament\Models\Contracts\HasEmail;
use Filament\Models\Contracts\HasAvatar;
use Filament\Panel;
use Illuminate\Support\Facades\Log;

class Paciente extends Authenticatable implements FilamentUser, HasName, HasAvatar
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
        'estado'   => 'string',
    ];

    /** Filament: acceso al panel */
    public function canAccessPanel(Panel $panel): bool
    {
        Log::info('canAccessPanel', ['panel' => $panel->getId(), 'this' => $this->id]);
        // Si querés, podés restringir además por estado:
        // return $panel->getId() === 'pacientes' && $this->isActive();
        return $panel->getId() === 'pacientes';
    }

    /** Login por DNI (opcional si ya lo tenés en el provider) */
    public function getAuthIdentifierName()
    {
        return 'dni';
    }

    /** === HasName === */
    public function getFilamentName(): string
    {
        // Asegurá siempre un string no nulo
        return $this->nombre
            ?: (string) ($this->dni ?? '')
            ?: ($this->email ?? 'Paciente');
    }

    /** === HasEmail (opcional, pero útil para el user menu) === */
    public function getFilamentEmail(): string
    {
        return $this->email ?? '';
    }

    /** === HasAvatar (opcional) === */
    public function getFilamentAvatarUrl(): ?string
    {
        return null; // o devuelve una URL si la tenés
    }

    /** Helpers propios */
    public function isActive(): bool
    {
        return $this->estado === 'activo';
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->getFilamentName();
    }

    public function getName(): string
    {
        return $this->getFilamentName();
    }

    public function getEmail(): string
    {
        return $this->getFilamentEmail();
    }

    // No es necesario en v4, pero no molesta si lo querés
    public function getFilamentIdentifierName(): string
    {
        return 'dni';
    }
}

