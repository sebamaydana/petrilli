<?php

namespace App\Filament\Resources\Pacientes\Widgets;

use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Facades\Auth;
use App\Models\Estudio;
use Filament\Actions\Action;
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
                Tables\Columns\TextColumn::make('id')
                    ->label('Nº Estudio')
                    ->formatStateUsing(fn ($state) => str_pad($state, 6, '0', STR_PAD_LEFT))
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Fecha')
                    ->dateTime('d/m/Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('descripcion')
                    ->label('Descripcion'),

                TextColumn::make('estado.nombre')
                    ->label('Estado')
                    ->html() // MUY importante para que no escape el HTML
                    ->formatStateUsing(function ($state, $record) {
                        $bg = $record->estado?->color ?: '#999';
                        $text = e($state); // por si el nombre trae caracteres especiales
    
                        return '<span style="background-color:' . $bg . ';'
                            . 'color:#fff;'
                            . 'padding:2px 8px;'
                            . 'border-radius:9999px;'
                            . 'font-size:0.675rem;'
                            . 'font-weight:500;'
                            . 'display:inline-block;">'
                            . $text
                            . '</span>';
                    }),
            ])
            ->filters([])
            ->actions([
                Action::make('ver_pdf')
                    ->label('Ver PDF')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->modalHeading('Visualizador de PDF')
                    ->modalContent(function ($record) {
                        $fileUrl   = route('pacientes.estudios.pdf', $record->id); // endpoint privado
                        $viewerUrl = asset('pdfjs/web/viewer.html') . '?file=' . urlencode($fileUrl);
                
                        return view('filament.modals.pdf-viewer', [
                            'viewerUrl' => $viewerUrl, // <- OJO: ahora pasamos el viewer
                            'downloadUrl' => '',
                        ]);
                    })
                    ->modalWidth('7xl')
                    // Ocultamos el botón "Enviar"
                    ->modalSubmitAction(false)
                    // Cambiamos el texto del cancelar
                    ->modalCancelActionLabel('Cerrar'),
                    Action::make('descargar')
                    ->label('Descargar')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('primary')
                    ->url(fn ($record) => route('pacientes.estudios.pdf', ['id' => $record->id, 'download' => 1]))
                    ->openUrlInNewTab(false),
            ])   // opcional: podrías agregar ver/descargar PDF
            ->paginated([10, 25]);
    }
}