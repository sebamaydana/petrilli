<?php

namespace App\Filament\Resources\Instructivos\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class InstructivosForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('titulo')
                    ->required()
                    ->maxLength(255),                
                TextInput::make('orden')
                    ->required()
                    ->numeric(),
                Select::make('estado')
                    ->options([
                        'activo' => 'Activo',
                        'inactivo' => 'Inactivo',
                    ])->default('activo')
                    ->required(),
                    RichEditor::make('descripcion')
                    ->required()
                    ->columnSpanFull()
                    ->extraAttributes(['style' => 'min-height: 300px;']),
            ]);
    }
}
