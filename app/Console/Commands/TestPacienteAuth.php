<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Paciente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TestPacienteAuth extends Command
{
    protected $signature = 'pacientes:test-auth';
    protected $description = 'Probar autenticación del paciente';

    public function handle()
    {
        $this->info('Probando autenticación del paciente...');
        
        // Crear un paciente de prueba
        $paciente = Paciente::updateOrCreate(
            ['dni' => '99999999'],
            [
                'nombre' => 'Paciente Test',
                'email' => 'test@test.com',
                'password' => Hash::make('123456'),
                'estado' => 'activo'
            ]
        );
        
        $this->info("Paciente creado: {$paciente->nombre} (DNI: {$paciente->dni})");
        
        // Probar métodos de Filament
        $this->info("\nProbando métodos de Filament:");
        $this->info("getFilamentName(): " . $paciente->getFilamentName());
        $this->info("getFilamentEmail(): " . $paciente->getFilamentEmail());
        $this->info("getUsername(): " . $paciente->getUsername());
        $this->info("getName(): " . $paciente->getName());
        
        // Probar autenticación
        $this->info("\nProbando autenticación:");
        $credentials = ['dni' => '99999999', 'password' => '123456'];
        
        if (Auth::guard('paciente')->attempt($credentials)) {
            $this->info("✅ Autenticación exitosa");
            $user = Auth::guard('paciente')->user();
            $this->info("Usuario autenticado: " . $user->getFilamentName());
        } else {
            $this->error("❌ Autenticación fallida");
        }
        
        return 0;
    }
}
