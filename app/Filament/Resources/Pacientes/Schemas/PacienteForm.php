<?php

namespace App\Filament\Resources\Pacientes\Schemas;

use App\Models\Estado;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Filament\Schemas\Schema;

class PacienteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->required()
                    ->email()
                    ->maxLength(255),
                TextInput::make('dni')
                    ->required()
                    ->numeric()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                Hidden::make('password'),
                Select::make('estado')
                    ->options(Estado::all()->pluck('nombre', 'id'))
                    ->required(),
            ]);
    }
}
