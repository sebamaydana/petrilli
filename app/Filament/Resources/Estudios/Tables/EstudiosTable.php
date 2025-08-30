<?php

namespace App\Filament\Resources\Estudios\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Filament\Forms\Components\View;

class EstudiosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('paciente.nombre')->label('Paciente')->searchable(),
                TextColumn::make('descripcion')->label('Descripción'),
                TextColumn::make('estado.nombre')
                    ->label('Estado')
                    ->badge()
                    ->color(fn ($record) => $record->estado?->color ?? 'gray'),
                TextColumn::make('descargas')
                    ->label('Descargas')
                    ->badge(),
                TextColumn::make('updated_at')->label('Fecha')->dateTime('d/m/Y H:i'),
            ])
            ->filters([
                
            ])
            ->recordActions([
                Action::make('ver_pdf')
                    ->label('Ver PDF')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->modalHeading('Visualizador de PDF')
                    ->modalContent(function ($record) {
                        $fileUrl   = route('estudios.pdf', $record->id); // endpoint privado
                        $viewerUrl = asset('pdfjs/web/viewer.html') . '?file=' . urlencode($fileUrl);
                
                        return view('filament.modals.pdf-viewer', [
                            'viewerUrl' => $viewerUrl, // <- OJO: ahora pasamos el viewer
                            'downloadUrl' => $fileUrl . '?download=1',
                        ]);
                    })
                    ->modalWidth('full')
                    // Ocultamos el botón "Enviar"
                    ->modalSubmitAction(false)
                    // Cambiamos el texto del cancelar
                    ->modalCancelActionLabel('Cerrar')
                    // Agregamos un botón primario "Descargar" que fuerza la descarga
                    ->extraModalFooterActions([
                        Action::make('descargar')
                            ->label('Descargar')
                            ->icon('heroicon-o-arrow-down-tray')
                            ->color('primary')
                            ->url(fn ($record) => route('estudios.pdf', ['id' => $record->id, 'download' => 1]))
                            ->openUrlInNewTab(false), // descarga en la misma pestaña
                    ]),
                EditAction::make(),
                DeleteAction::make(),
                
            ])
            ->toolbarActions([                
            ]);
    }
}
