<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\Filament\PacientePanelProvider;
use Filament\Auth\Http\Responses\Contracts\LoginResponse as FilamentLoginResponse;
use App\Filament\Pacientes\Response\PacienteLoginResponse;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Registrar el panel de pacientes
        $this->app->register(PacientePanelProvider::class);

        $this->app->bind(FilamentLoginResponse::class, function () {
            return new PacienteLoginResponse();
        });
    }
}
