<?php

namespace App\Filament\Resources\Pacientes\Pages;

use App\Filament\Resources\Pacientes\PacienteResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;

class CreatePaciente extends CreateRecord
{
    protected static string $resource = PacienteResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Hashear el DNI y guardarlo como contraseña
        $data['password'] = Hash::make($data['dni']);
        
        return $data;
    }
}
