<?php

namespace App\Filament\Widgets;

use App\Models\Turno;
use App\Filament\Resources\Turnos\TurnosResource;
use Guava\Calendar\Enums\CalendarViewType;
use Guava\Calendar\Filament\CalendarWidget;
use Guava\Calendar\ValueObjects\CalendarEvent;
use Guava\Calendar\ValueObjects\FetchInfo;
use Illuminate\Support\Collection;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Carbon;

class TurnosCalendarWidget extends CalendarWidget
{
    protected CalendarViewType $calendarView = CalendarViewType::DayGridMonth;

    public function getHeading(): string
    {
        return 'Calendario de Turnos';
    }

    public function rendered(): void
    {
        // Forzar idioma español y traducir el botón "Today" a "Hoy"
        $this->dispatch('calendar--set', key: 'locale', value: 'es');
        $this->dispatch('calendar--set', key: 'buttonText', value: ['today' => 'Hoy']);

        // Ocultar segundos en la visualización de tiempos
        $this->dispatch('calendar--set', key: 'eventTimeFormat', value: [
            'hour' => '2-digit',
            'minute' => '2-digit',
            'meridiem' => false,
        ]);
        $this->dispatch('calendar--set', key: 'slotLabelFormat', value: [
            'hour' => '2-digit',
            'minute' => '2-digit',
            'meridiem' => false,
        ]);
    }

    public function getHeaderActions(): array
    {
        return [
            Action::make('crearTurno')
                ->label('Nuevo turno')
                ->icon('heroicon-o-plus')
                ->modalHeading('Crear turno')
                ->form([
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
                ])
                ->action(function (array $data) {
					$inicio = Carbon::parse("{$data['fecha']} {$data['hora_inicio']}")->toDateTimeString();
					$fin = Carbon::parse("{$data['fecha']} {$data['hora_fin']}")->toDateTimeString();

					Turno::create([
						'inicio' => $inicio,
						'fin' => $fin,
						'titulo' => $data['titulo'],
						'estado' => 'libre',
					]);

                    // Refresca el calendario en el frontend
                    $this->dispatch('calendar--refresh');
                })
                ->successNotificationTitle('Turno creado')
                ,
        ];
    }

    protected function getEvents(FetchInfo $info): Collection | array
    {
        $turnos = Turno::query()
            ->whereDate('fin', '>=', $info->start)
            ->whereDate('inicio', '<=', $info->end)
            ->get();

        return $turnos->map(function (Turno $t) {
            $titulo = $t->titulo;

            if (filled($t->nombre)) {
                $titulo .= ' - ' . $t->nombre;
            }

            $color = $t->estado === 'libre' ? '#22c55e' : '#94a3b8';

            return CalendarEvent::make()
                ->title($titulo)
                ->start($t->inicio)
                ->end($t->fin)
                // Colorea en verde cuando el estado es "libre"
                ->backgroundColor($color)
                ->url(route('filament.admin.resources.turnos.edit', ['record' => $t->id]), '_self');
        });
    }
}


