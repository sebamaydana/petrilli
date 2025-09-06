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

class Paciente extends Authenticatable implements FilamentUser, HasName
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

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /** Filament: acceso al panel */
    public function canAccessPanel(Panel $panel): bool
    {
        Log::info('canAccessPanel', ['panel' => $panel->getId(), 'this' => $this->id]);
        // Si querés, podés restringir además por estado:
        // return $panel->getId() === 'pacientes' && $this->isActive();
        return $panel->getId() === 'pacientes';
    }
    
    public function getFilamentName(): string
    {
        return (string) ($this->nombre
            ?? $this->name
            ?? $this->email
            ?? $this->dni
            ?? 'Paciente');
    }
}

