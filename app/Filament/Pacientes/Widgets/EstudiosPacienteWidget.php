<?php

namespace App\Filament\Pacientes\Widgets;

use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Facades\Auth;
use App\Models\Estudio;
use Filament\Actions\Action;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\Layout\Split;
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
            // === VISTA TABLA PARA DESKTOP ===
            Split::make([
                TextColumn::make('id')
                    ->label('Nº Estudio')
                    ->formatStateUsing(fn ($state) => str_pad($state, 6, '0', STR_PAD_LEFT))
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->label('Fecha')
                    ->dateTime('d/m/Y')
                    ->sortable(),

                TextColumn::make('descripcion')
                    ->label('Descripción')
                    ->limit(60)
                    ->wrap(),

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
                    }),
            ])
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