<?php

namespace App\Filament\Resources\Turnos\Pages;

use App\Filament\Resources\Turnos\TurnosResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CreateTurno extends CreateRecord
{
    protected static string $resource = TurnosResource::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->schema([
                DateTimePicker::make('inicio')->label('Inicio')->required()->seconds(false),
                DateTimePicker::make('fin')->label('Fin')->required()->seconds(false),
                TextInput::make('titulo')->label('Título')->required()->maxLength(255),
            ]);
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['estado'] = 'libre';

        return $data;
    }
}


