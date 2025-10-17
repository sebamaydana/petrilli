<?php

namespace App\Filament\Resources\Turnos\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TurnoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->schema([
                DateTimePicker::make('inicio')->label('Inicio')->required()->seconds(false),
                DateTimePicker::make('fin')->label('Fin')->required()->seconds(false),
                TextInput::make('titulo')->label('Título')->required()->maxLength(255),
                TextInput::make('nombre')->label('Nombre')->maxLength(255),
                TextInput::make('celular')->label('Celular')->tel()->maxLength(50),
                TextInput::make('correo')->label('Correo')->email()->maxLength(255),
                TextInput::make('dni')->label('DNI')->maxLength(50),
                Select::make('estado')->label('Estado')->options([
                    'libre' => 'Libre',
                    'pendiente' => 'Pendiente',
                    'confirmado' => 'Confirmado',
                    'cancelado' => 'Cancelado',
                ])->default('libre'),
                Textarea::make('comentario')->label('Comentario')->rows(3)->columnSpanFull(),
            ]);
    }
}


