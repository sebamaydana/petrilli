<?php
// app/Providers/Filament/PatientPanelProvider.php
namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use App\Filament\Patients\Pages\Auth\Login as PacienteLogin;

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
            ->discoverResources(in: app_path('Filament/Patients/Resources'), for: 'App\\Filament\\Patients\\Resources')
            ->discoverPages(in: app_path('Filament/Patients/Pages'), for: 'App\\Filament\\Patients\\Pages')
            ->discoverWidgets(in: app_path('Filament/Patients/Widgets'), for: 'App\\Filament\\Patients\\Widgets')
            ->brandName('Portal de Pacientes');
    }
}
