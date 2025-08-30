<?php

namespace App\Filament\Resources\Pacientes\Tables;

use App\Imports\PacientesImport;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class PacientesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')->label('Nombre'),
                TextColumn::make('email')->label('Email'),
                TextColumn::make('dni')->label('DNI'),
                TextColumn::make('estado')->label('Estado'),
                TextColumn::make('updated_at')->label('Fecha')->dateTime('d/m/Y H:i'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->headerActions([
                Action::make('importar')
                ->label('Importar Excel')
                ->icon('heroicon-o-arrow-up-tray')
                ->form([
                    FileUpload::make('file')
                        ->label('Archivo Excel')
                        ->required()
                        ->disk('local')              // 👈 usamos "local" (storage/app)
                        ->directory('imports')       // => storage/app/imports/...
                        ->visibility('private')
                        ->acceptedFileTypes([
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                            'application/vnd.ms-excel',
                        ]),
                ])
                ->action(function (array $data) {
                    try {
                        // $data['file'] es la ruta relativa dentro del disk
                        $relativePath = $data['file'];                     // ej: "imports/xxxxx.xlsx"
                        $absolutePath = Storage::disk('local')->path($relativePath);

                        if (! Storage::disk('local')->exists($relativePath)) {
                            throw new \RuntimeException("El archivo no existe en: {$absolutePath}");
                        }

                        $import = new PacientesImport();
                        Excel::import($import, $absolutePath);

                        $s = $import->getSummary();
                        Notification::make()
                            ->title('Importación completada')
                            ->body("Creados: {$s['created']} · Actualizados: {$s['updated']} · Restaurados: {$s['restored']} · Omitidos: {$s['skipped']}")
                            ->success()
                            ->send();

                    } catch (\Throwable $e) {
                        Notification::make()
                            ->title('Error al importar')
                            ->body($e->getMessage())
                            ->danger()
                            ->send();
                    }
                })
            ])
            ->toolbarActions([
                
            ]);
    }
}
