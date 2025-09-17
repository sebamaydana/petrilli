<?php

namespace App\Filament\Resources\Instructivos\Pages;

use App\Filament\Resources\Instructivos\InstructivosResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListInstructivos extends ListRecords
{
    protected static string $resource = InstructivosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
