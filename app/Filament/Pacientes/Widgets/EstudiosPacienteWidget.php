<?php

namespace App\Filament\Pacientes\Widgets;

use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Facades\Auth;
use App\Models\Estudio;
use Filament\Actions\Action;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;

class EstudiosPacienteWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    public function table(Tables\Table $table): Tables\Table
    {
        
        return $table
        ->query(
            Estudio::query()
                ->where('paciente_id', Auth::guard('paciente')->id())
        )
        ->columns([
            // === VISTA "CARD" PARA MOBILE ===
            Stack::make([
                TextColumn::make('id')
                    ->label('Nº Estudio')
                    ->formatStateUsing(fn ($state) => str_pad($state, 6, '0', STR_PAD_LEFT))
                    ->weight('bold')
                    ->size('sm'),

                TextColumn::make('updated_at')
                    ->label('Fecha')
                    ->dateTime('d/m/Y')
                    ->icon('heroicon-o-calendar')
                    ->size('sm'),

                TextColumn::make('descripcion')
                    ->label('Descripción')
                    ->limit(120)      // evita columnas “infinitas”
                    ->wrap(),         // permite salto de línea

                TextColumn::make('estado.nombre')
                    ->label('Estado')
                    ->html()
                    ->formatStateUsing(function ($state, $record) {
                        $bg = $record->estado?->color ?: '#999';
                        $text = e($state);

                        return '<span style="background-color:' . $bg . ';'
                            . 'color:#fff;'
                            . 'padding:2px 8px;'
                            . 'border-radius:9999px;'
                            . 'font-size:0.75rem;'
                            . 'font-weight:600;'
                            . 'display:inline-block;">'
                            . $text
                            . '</span>';
                    }),
            ])
            ->hiddenFrom('md'), // <-- SOLO mobile

            // === COLUMNAS CLÁSICAS DESDE md+ ===
            TextColumn::make('id')
                ->label('Nº Estudio')
                ->formatStateUsing(fn ($state) => str_pad($state, 6, '0', STR_PAD_LEFT))
                ->sortable()
                ->visibleFrom('md'),

            TextColumn::make('updated_at')
                ->label('Fecha')
                ->dateTime('d/m/Y')
                ->sortable()
                ->visibleFrom('md'),

            TextColumn::make('descripcion')
                ->label('Descripción')
                ->limit(60)
                ->wrap()
                ->visibleFrom('md'),

            TextColumn::make('estado.nombre')
                ->label('Estado')
                ->html()
                ->formatStateUsing(function ($state, $record) {
                    $bg = $record->estado?->color ?: '#999';
                    $text = e($state);

                    return '<span style="background-color:' . $bg . ';'
                        . 'color:#fff;'
                        . 'padding:2px 8px;'
                        . 'border-radius:9999px;'
                        . 'font-size:0.675rem;'
                        . 'font-weight:600;'
                        . 'display:inline-block;">'
                        . $text
                        . '</span>';
                })
                ->visibleFrom('md'),
        ])
        ->filters([])
        ->actions([
            Action::make('ver_pdf')
                ->label('Ver')
                ->icon('heroicon-o-eye')
                ->iconButton() // compacto en mobile
                ->color('info')
                ->modalHeading('Visualizador de PDF')
                ->modalContent(function ($record) {
                    $fileUrl   = route('pacientes.estudios.pdf', $record->id);
                    $viewerUrl = asset('pdfjs/web/viewer.html') . '?file=' . urlencode($fileUrl);

                    return view('filament.modals.pdf-viewer', [
                        'viewerUrl'   => $viewerUrl,
                        'downloadUrl' => '',
                    ]);
                })
                ->modalWidth('7xl')
                ->modalSubmitAction(false)
                ->modalCancelActionLabel('Cerrar'),

            Action::make('descargar')
                ->label('Desc')
                ->icon('heroicon-o-arrow-down-tray')
                ->iconButton() // compacto en mobile
                ->color('primary')
                ->url(fn ($record) => route('pacientes.estudios.pdf', ['id' => $record->id, 'download' => 1]))
                ->openUrlInNewTab(false),
        ])
        ->defaultSort('updated_at', 'desc')
        ->paginated([10, 25]);
    }
}