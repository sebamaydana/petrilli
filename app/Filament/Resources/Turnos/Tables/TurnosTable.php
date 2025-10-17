<?php

namespace App\Filament\Resources\Turnos\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TurnosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('inicio')->label('Inicio')->dateTime('d/m/Y H:i'),
                TextColumn::make('fin')->label('Fin')->dateTime('d/m/Y H:i'),
                TextColumn::make('titulo')->label('Título')->searchable(),
                TextColumn::make('nombre')->label('Nombre')->searchable(),
                TextColumn::make('estado')->label('Estado')->badge(),
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
                \Filament\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\DeleteBulkAction::make(),
            ]);
    }
}


