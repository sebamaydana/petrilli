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
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;

class TurnosCalendarWidget extends CalendarWidget
{
    protected CalendarViewType $calendarView = CalendarViewType::DayGridMonth;

    public function getHeaderActions(): array
    {
        return [
            Action::make('crearTurno')
                ->label('Nuevo turno')
                ->icon('heroicon-o-plus')
                ->modalHeading('Crear turno')
                ->form([
                    DateTimePicker::make('inicio')->label('Inicio')->required()->seconds(false),
                    DateTimePicker::make('fin')->label('Fin')->required()->seconds(false),
                    TextInput::make('titulo')->label('Título')->required()->maxLength(255),
                ])
                ->action(function (array $data) {
                    Turno::create([
                        ...$data,
                        'estado' => 'libre',
                    ]);
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
            $titulo = $t->titulo . ' - ' . $t->nombre;

            return CalendarEvent::make()
                ->title($titulo)
                ->start($t->inicio)
                ->end($t->fin)
                ->url(route('filament.admin.resources.turnos.edit', ['record' => $t->id]), '_self');
        });
    }
}


