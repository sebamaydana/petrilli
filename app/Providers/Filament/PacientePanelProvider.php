<?php
// app/Providers/Filament/PatientPanelProvider.php
namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use App\Filament\Pacientes\Pages\Auth\Login as PacienteLogin;
use App\Filament\Pacientes\Pages\Dashboard;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class PacientePanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('pacientes')
            ->path('/pacientes')                                    // Ruta raíz del subdominio            
            ->domain('pacientes.petrillilab.local')        // Subdominio específico
            ->login(PacienteLogin::class)                  // login personalizado (DNI)
            ->authGuard('paciente')
            ->brandLogo(asset('images/logo.png'))
            ->brandLogoHeight('3rem')
            ->favicon(asset('images/favicon.png'))
            ->colors([
                'primary' => Color::Blue,
            ])
            ->discoverResources(in: app_path('Filament/Pacientes/Resources'), for: 'App\\Filament\\Pacientes\\Resources')
            ->discoverPages(in: app_path('Filament/Pacientes/Pages'), for: 'App\\Filament\\Pacientes\\Pages')
            ->discoverWidgets(in: app_path('Filament/Pacientes/Widgets'), for: 'App\\Filament\\Pacientes\\Widgets')
            ->pages([
                Dashboard::class,
            ])
            ->brandName('Portal de Pacientes')
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
