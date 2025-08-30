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
                TextColumn::make('nombre')->label('Nombre')->searchable(),
                TextColumn::make('dni')->label('DNI')->searchable(),
                TextColumn::make('email')->label('Email'),                
                TextColumn::make('estado')
                    ->label('Estado')
                    ->badge()
                    ->color(fn ($record) => $record->estado === 'activo' ? 'success' : 'danger'),
                TextColumn::make('updated_at')->label('Fecha')->dateTime('d/m/Y H:i'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])            
            ->toolbarActions([
                
            ]);
    }
}
