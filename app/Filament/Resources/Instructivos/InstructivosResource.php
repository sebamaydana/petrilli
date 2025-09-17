<?php

namespace App\Filament\Resources\Instructivos;

use App\Filament\Resources\Instructivos\Pages\CreateInstructivos;
use App\Filament\Resources\Instructivos\Pages\EditInstructivos;
use App\Filament\Resources\Instructivos\Pages\ListInstructivos;
use App\Filament\Resources\Instructivos\Schemas\InstructivosForm;
use App\Filament\Resources\Instructivos\Tables\InstructivosTable;
use App\Models\Instructivo;
use App\Models\Instructivos;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class InstructivosResource extends Resource
{
    protected static ?string $model = Instructivo::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static UnitEnum|string|null $navigationGroup = 'Web';

    public static function form(Schema $schema): Schema
    {
        return InstructivosForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InstructivosTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListInstructivos::route('/'),
            'create' => CreateInstructivos::route('/create'),
            'edit' => EditInstructivos::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
