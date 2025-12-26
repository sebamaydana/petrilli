<?php

namespace App\Filament\Resources\Estudios\Schemas;

use App\Models\Estado;
use App\Models\Paciente;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EstudioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('paciente_id')->label('Paciente')
                    ->options(
                        Paciente::orderBy('nombre')
                            ->get()
                            ->mapWithKeys(function (Paciente $paciente) {
                                $dni = $paciente->dni ? " ({$paciente->dni})" : '';

                                return [$paciente->id => $paciente->nombre . $dni];
                            })
                    )
                    ->searchable()
                    ->required(),
                TextInput::make('descripcion')->label('Descripción')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('pdf')->label('PDF')
                    ->required()
                    ->disk('local')
                    ->directory('estudios')
                    ->visibility('private')
                    ->acceptedFileTypes([
                        'application/pdf',
                    ]),
                Select::make('estado_id')->label('Estado')
                    ->options(Estado::all()->pluck('nombre', 'id'))
                    ->required(),
            ]);
    }
}
