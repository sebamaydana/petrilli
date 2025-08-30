<?php
// app/Providers/Filament/PatientPanelProvider.php
namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use App\Filament\Resources\Pacientes\Pages\Auth\Login as PacienteLogin;

class PacientePanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('pacientes')
            ->path('/')                               // raíz del subdominio
            ->domain('pacientes.petrillilab.local')  // <- subdominio
            ->login(PacienteLogin::class)             // login personalizado (DNI)
            ->authGuard('paciente')                   // guard "patient"
            ->colors([
                'primary' => '#0ea5e9',
            ])
            ->discoverResources(in: app_path('Filament/Pacientes/Resources'), for: 'App\\Filament\\Pacientes\\Resources')
            ->discoverPages(in: app_path('Filament/Pacientes/Pages'), for: 'App\\Filament\\Pacientes\\Pages')
            ->discoverWidgets(in: app_path('Filament/Pacientes/Widgets'), for: 'App\\Filament\\Pacientes\\Widgets')
            ->brandName('Portal de Pacientes');
    }
}
