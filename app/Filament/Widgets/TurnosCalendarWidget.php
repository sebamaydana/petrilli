<?php

namespace App\Filament\Widgets;

use App\Models\Turno;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Guava\Calendar\Enums\CalendarViewType;
use Guava\Calendar\Filament\Actions\CreateAction;
use Guava\Calendar\Filament\Actions\EditAction;
use Guava\Calendar\Filament\CalendarWidget;
use Guava\Calendar\ValueObjects\CalendarEvent;
use Guava\Calendar\ValueObjects\FetchInfo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class TurnosCalendarWidget extends CalendarWidget
{
    protected CalendarViewType $calendarView = CalendarViewType::DayGridMonth;

    protected bool $eventClickEnabled = true;

    protected ?string $defaultEventClickAction = 'edit';

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

    public function createTurnoAction(): CreateAction
    {
        return $this->createAction(Turno::class)
            ->label('Nuevo turno')
            ->icon('heroicon-o-plus')
            ->modalHeading('Crear turno')
            ->createAnother(false)
            ->successNotificationTitle('Turno creado')
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
            ])
            ->mutateDataUsing(function (array $data): array {
                $data['inicio'] = Carbon::parse("{$data['fecha']} {$data['hora_inicio']}")->toDateTimeString();
                $data['fin'] = Carbon::parse("{$data['fecha']} {$data['hora_fin']}")->toDateTimeString();
                unset($data['fecha'], $data['hora_inicio'], $data['hora_fin']);
                $data['estado'] = 'libre';

                return $data;
            });
    }

    public function getHeaderActions(): array
    {
        return [
            $this->createTurnoAction(),
        ];
    }

    public function editAction(): EditAction
    {
        return parent::editAction()
            ->modalHeading('Editar turno')
            ->extraModalFooterActions([
                $this->deleteAction()->cancelParentActions(),
            ]);
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

            return CalendarEvent::make($t)
                ->title($titulo)
                ->start($t->inicio)
                ->end($t->fin)
                ->backgroundColor($color);
        });
    }
}
