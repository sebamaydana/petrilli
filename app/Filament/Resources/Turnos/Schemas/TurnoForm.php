<?php

namespace App\Filament\Resources\Turnos\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
// Note: typehinting closures with callable for get/set for compatibility
use Filament\Schemas\Schema;
use Illuminate\Support\Carbon;

class TurnoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->schema([
				// Fecha + horas (UI) -> se combinan en los campos reales 'inicio' y 'fin'
				DatePicker::make('fecha')
					->label('Fecha')
					->required()
					->minDate(now())
					->reactive()
					->formatStateUsing(function ($state, callable $get) {
						$inicio = $get('inicio');
						return $inicio ? Carbon::parse($inicio)->toDateString() : $state;
					})
					->afterStateUpdated(function ($state, callable $set, callable $get) {
						$horaInicio = $get('hora_inicio');
						$horaFin = $get('hora_fin');
						if ($state && $horaInicio) {
							$set('inicio', Carbon::parse("{$state} {$horaInicio}")->toDateTimeString());
						}
						if ($state && $horaFin) {
							$set('fin', Carbon::parse("{$state} {$horaFin}")->toDateTimeString());
						}
					}),
				TimePicker::make('hora_inicio')
					->label('Hora inicio')
					->required()
					->seconds(false)
					->reactive()
					->formatStateUsing(function ($state, callable $get) {
						$inicio = $get('inicio');
						return $inicio ? Carbon::parse($inicio)->format('H:i') : $state;
					})
					->afterStateUpdated(function ($state, callable $set, callable $get) {
						// Si no hay hora_fin aún, copiarla desde hora_inicio
						if (blank($get('hora_fin')) && filled($state)) {
							$set('hora_fin', $state);
						}
						$fecha = $get('fecha');
						if ($fecha && $state) {
							$set('inicio', Carbon::parse("{$fecha} {$state}")->toDateTimeString());
						}
					}),
				TimePicker::make('hora_fin')
					->label('Hora fin')
					->required()
					->seconds(false)
					->reactive()
					->formatStateUsing(function ($state, callable $get) {
						$fin = $get('fin');
						return $fin ? Carbon::parse($fin)->format('H:i') : $state;
					})
					->afterStateUpdated(function ($state, callable $set, callable $get) {
						$fecha = $get('fecha');
						if ($fecha && $state) {
							$set('fin', Carbon::parse("{$fecha} {$state}")->toDateTimeString());
						}
					}),
				// Campos reales que se guardan en la base de datos
				Hidden::make('inicio'),
				Hidden::make('fin'),
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


