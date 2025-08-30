<?php

namespace App\Filament\Resources\Estudios\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class EstudiosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([                
            ]);
    }
}
