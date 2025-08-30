<?php

namespace App\Filament\Resources\Pacientes\Pages;

use App\Filament\Resources\Pacientes\PacienteResource;
use App\Imports\PacientesImport;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ListPacientes extends ListRecords
{
    protected static string $resource = PacienteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
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
                        $relativePath = $data['file'];
                        $absolutePath = Storage::disk('local')->path($relativePath);
                
                        $import = new PacientesImport();
                        Excel::import($import, $absolutePath);
                
                        Notification::make()
                            ->title('Importación completada')
                            ->body('Se importaron los datos correctamente')
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
        ];
    }
}
