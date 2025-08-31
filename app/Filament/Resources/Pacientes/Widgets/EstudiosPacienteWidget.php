<?php

namespace App\Filament\Resources\Pacientes\Widgets;

use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Facades\Auth;
use App\Models\Estudio;
use Filament\Actions\Action;

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

                Tables\Columns\TextColumn::make('estado.nombre')
                    ->badge()
                    ->color(fn ($record) => $record->color ?? 'secondary'),
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
            ])   // opcional: podrías agregar ver/descargar PDF
            ->paginated([10, 25]);
    }
}