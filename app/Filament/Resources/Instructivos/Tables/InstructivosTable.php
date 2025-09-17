<?php

namespace App\Filament\Resources\Instructivos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class InstructivosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('titulo'),                
                TextColumn::make('orden'),
                TextColumn::make('estado')
                    ->badge()
                    ->color(fn ($record) => $record->estado === 'activo' ? 'success' : 'danger'),
                TextColumn::make('updated_at')->label('Fecha')->dateTime('d/m/Y H:i'),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                
            ]);
    }
}
