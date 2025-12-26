<?php

namespace App\Filament\Resources\Turnos\Pages;

use App\Filament\Resources\Turnos\TurnosResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Carbon;

class CreateTurno extends CreateRecord
{
    protected static string $resource = TurnosResource::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->schema([
				DatePicker::make('fecha')
					->label('Fecha')
					->required()
					->minDate(now())
					->reactive(),
				TimePicker::make('hora_inicio')
					->label('Hora inicio')
					->required()
					->seconds(false)
					->reactive()
					->afterStateUpdated(function ($state, callable $set, callable $get) {
						if (blank($get('hora_fin')) && filled($state)) {
							$set('hora_fin', $state);
						}
					}),
				TimePicker::make('hora_fin')->label('Hora fin')->required()->seconds(false),
                TextInput::make('titulo')->label('Título')->required()->maxLength(255),
            ]);
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
		$data['inicio'] = Carbon::parse("{$data['fecha']} {$data['hora_inicio']}")->toDateTimeString();
		$data['fin'] = Carbon::parse("{$data['fecha']} {$data['hora_fin']}")->toDateTimeString();
		unset($data['fecha'], $data['hora_inicio'], $data['hora_fin']);
		$data['estado'] = 'libre';

        return $data;
    }
}


