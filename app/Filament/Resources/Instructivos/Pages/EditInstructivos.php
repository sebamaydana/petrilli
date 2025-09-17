<?php

namespace App\Filament\Resources\Instructivos\Pages;

use App\Filament\Resources\Instructivos\InstructivosResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditInstructivos extends EditRecord
{
    protected static string $resource = InstructivosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
