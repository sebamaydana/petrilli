<?php

namespace App\Filament\Resources\Pacientes\Pages\Auth;

use Filament\Auth\Pages\Login as PagesLogin;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class Login extends PagesLogin
{
    public function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('dni')
                ->label('DNI')
                ->required()
                ->numeric()
                ->autocomplete('username'),

            TextInput::make('password')
                ->label('Contraseña')
                ->password()
                ->revealable()
                ->required(),
        ]);
    }

    protected function getCredentialsFromFormData(array $data): array
    {
        return [
            'dni'      => $data['dni'],
            'password' => $data['password'],
        ];
    }

    protected function getAuthGuard(): string
    {
        return 'paciente';
    }

    protected function hasRemember(): bool
    {
        return false;
    }
}
