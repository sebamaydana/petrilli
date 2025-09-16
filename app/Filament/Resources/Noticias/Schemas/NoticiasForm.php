<?php

namespace App\Filament\Resources\Noticias\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class NoticiasForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('titulo')
                    ->required()
                    ->maxLength(255),
                DatePicker::make('fecha')
                    ->required(),                
                FileUpload::make('imagen')
                    ->required()
                    ->disk('local')
                    ->directory('noticias')
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->imageResizeMode('cover')
                    ->imageResizeTargetWidth(784)
                    ->imageResizeTargetHeight(583),
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
