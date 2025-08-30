<?php

namespace App\Filament\Resources\Pacientes\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use BackedEnum;
use Illuminate\Support\Facades\Auth;

class Dashboard extends BaseDashboard
{
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-home';
    
    protected static string $resource = \App\Filament\Resources\Pacientes\PacienteResource::class;
    
    public function getTitle(): string
    {
        return 'Mi Panel de Paciente';
    }
    
    public function getHeading(): string
    {
        return 'Bienvenido, ' . Auth::guard('paciente')->user()->nombre;
    }
}
