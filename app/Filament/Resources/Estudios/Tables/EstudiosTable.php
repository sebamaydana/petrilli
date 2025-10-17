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
use Illuminate\Support\Str;

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
                ->html()
                ->formatStateUsing(fn ($state, $record) => 
                    "<span style='background-color:{$record->estado?->color}; 
                                color:#fff; 
                                padding:2px 8px; 
                                border-radius:9999px;'>{$state}</span>"
                ),
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
                    ->modalWidth('7xl')
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
                Action::make('qr_publico')
                    ->label('QR Público')
                    ->icon('heroicon-o-qr-code')
                    ->color('success')
                    ->modalHeading('Compartir estudio')
                    ->modalContent(function ($record) {
                        if (empty($record->public_token)) {
                            $record->public_token = Str::random(48);
                            $record->save();
                        }
                        $publicUrl = route('public.estudios.pdf', ['token' => $record->public_token]);
                        // Usamos la API de quickchart para generar QR sin dependencia local
                        $qrSrc = 'https://quickchart.io/qr?text=' . urlencode($publicUrl) . '&size=240&margin=2';

                        return view('filament.modals.qr-viewer', [
                            'publicUrl' => $publicUrl,
                            'qrSrc' => $qrSrc,
                        ]);
                    })
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Cerrar')
                    ->extraModalFooterActions([
                        Action::make('copiar')
                            ->label('Copiar enlace')
                            ->icon('heroicon-o-clipboard')
                            ->color('gray')
                            ->action(function ($record) {
                                // No-op: se maneja en el cliente con navigator.clipboard si se desea
                            })
                            ->visible(false),
                        Action::make('abrir')
                            ->label('Abrir enlace')
                            ->icon('heroicon-o-arrow-top-right-on-square')
                            ->color('primary')
                            ->url(fn ($record) => route('public.estudios.pdf', ['token' => $record->public_token]))
                            ->openUrlInNewTab(true),
                        Action::make('whatsapp')
                            ->label('Enviar por WhatsApp')
                            ->icon('heroicon-o-chat-bubble-left-right')
                            ->color('success')
                            ->url(function ($record) {
                                if (empty($record->public_token)) {
                                    $record->public_token = Str::random(48);
                                    $record->save();
                                }

                                $publicUrl = route('public.estudios.pdf', ['token' => $record->public_token]);

                                $rawPhone = (string) ($record->paciente->celular ?? '543434471947');
                                $phone    = preg_replace('/\D+/', '', $rawPhone);

                                $mensaje = 'Hola, te comparto tu estudio: ' . $publicUrl;

                                return 'https://api.whatsapp.com/send?phone=' . $phone . '&text=' . urlencode($mensaje);
                            })
                            ->visible(fn ($record) => !empty($record->paciente?->celular))
                            ->openUrlInNewTab(true),
                    ]),
                
                EditAction::make(),
                DeleteAction::make(),
                
            ])
            ->toolbarActions([                
            ]);
    }
}
