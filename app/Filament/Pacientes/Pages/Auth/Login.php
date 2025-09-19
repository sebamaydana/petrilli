<?php

namespace App\Filament\Pacientes\Pages\Auth;

use App\Filament\Pacientes\Response\PacienteLoginResponse;
use Filament\Auth\Pages\Login as PagesLogin;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use App\Models\Paciente;
use Filament\Auth\Http\Responses\Contracts\LoginResponse;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;

class Login extends PagesLogin
{
    public function getHeading(): string
    {
        return 'Acceso al Portal de Pacientes';
    }    

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('dni')
                ->label('DNI')
                ->required()
                ->numeric()
                ->autocomplete('username')
                ->validationMessages([
                    'required' => 'El DNI es obligatorio.',
                    'numeric' => 'El DNI debe contener solo números.',
                ]),

            TextInput::make('password')
                ->label('Contraseña')
                ->password()
                ->revealable()
                ->required()
                ->validationMessages([
                    'required' => 'La contraseña es obligatoria.',
                ]),
        ]);
    }    

    protected function getCredentialsFromFormData(array $data): array
    {
        return [
            'dni'      => $data['dni'],
            'password' => $data['password'],
        ];
    }

    protected function throwFailureValidationException(): never
    {
        throw ValidationException::withMessages([
            'dni' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }

    protected function getAuthGuard(): string
    {
        return 'paciente';
    }

    protected function hasRemember(): bool
    {
        return true;
    }

    public function authenticate(): ?LoginResponse
    {
        try {
            $this->rateLimit(5);
        } catch (TooManyRequestsException $exception) {
            $this->getRateLimitedNotification($exception)?->send();
            return null;
        }

        $data = $this->form->getState();
        $credentials = $this->getCredentialsFromFormData($data);

        // Verificar si el paciente existe
        $paciente = Paciente::where('dni', $credentials['dni'])->first();
        
        if (!$paciente) {
            throw ValidationException::withMessages([
                'data.dni' => 'No existe un paciente con este DNI.',
            ]);
        }

        // Intentar autenticar
        if (!Auth::guard('paciente')->attempt($credentials, $this->hasRemember())) {
            throw ValidationException::withMessages([
                'data.password' => 'La contraseña es incorrecta.',
            ]);
        }

        session()->regenerate();

        return app(PacienteLoginResponse::class);
        
    }
}
