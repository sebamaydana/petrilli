<?php

namespace App\Filament\Resources\Pacientes\Pages\Auth;

use Filament\Forms\Form;
use Filament\Pages\Auth\Login as BaseLogin;
use Filament\Forms\Components\TextInput;

class Login extends BaseLogin
{
    public function form(Form $form): Form
    {
        return $form->schema([
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
        return 'patient';
    }

    protected function hasRemember(): bool
    {
        return false;
    }
}
