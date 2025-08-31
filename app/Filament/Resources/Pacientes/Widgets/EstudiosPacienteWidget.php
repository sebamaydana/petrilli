<?php

namespace App\Filament\Resources\Pacientes\Widgets;

use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Facades\Auth;
use App\Models\Estudio;

class EstudiosPacienteWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    public function table(Tables\Table $table): Tables\Table
    {
        
        return $table
            ->query(
                Estudio::query()
                    ->where('paciente_id', Auth::guard('paciente')->id())
            )
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('Nº Estudio')
                    ->formatStateUsing(fn ($state) => str_pad($state, 6, '0', STR_PAD_LEFT))
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Fecha')
                    ->dateTime('d/m/Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('descripcion')
                    ->label('Descripcion'),

                Tables\Columns\TextColumn::make('estado.nombre')
                    ->badge()
                    ->color(fn ($record) => $record->color ?? 'secondary'),
            ])
            ->filters([])
            ->actions([])   // opcional: podrías agregar ver/descargar PDF
            ->paginated([10, 25]);
    }
}