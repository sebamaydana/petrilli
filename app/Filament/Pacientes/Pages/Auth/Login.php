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
use Filament\Facades\Filament;

class Login extends PagesLogin
{
    public function mount(): void
    {
        if (auth('paciente')->check()) {
            // Obtener la URL del panel "pacientes"
            if (auth('paciente')->check()) {
                $this->redirect('/pacientes');
            }
        }
    }
    
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
    
        $paciente = \App\Models\Paciente::where('dni', $credentials['dni'])->first();
    
        if (! $paciente) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'data.dni' => 'No existe un paciente con este DNI.',
            ]);
        }
    
        if (! \Illuminate\Support\Facades\Auth::guard('paciente')->attempt($credentials, $this->hasRemember())) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'data.password' => 'La contraseña es incorrecta.',
            ]);
        }
    
        session()->regenerate();
    
        // ⚡ Redirección lado-componente (Livewire) y NO devolvemos un RedirectResponse
        $this->redirect('/pacientes', navigate: true);
    
        // ✅ La firma permite null
        return null;
    }
}
