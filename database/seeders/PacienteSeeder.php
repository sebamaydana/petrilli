<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paciente;
use Illuminate\Support\Facades\Hash;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Paciente::create([
            'nombre' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'dni' => '12345678',
            'password' => Hash::make('password'),
            'estado' => 'activo',
        ]);

        Paciente::create([
            'nombre' => 'María García',
            'email' => 'maria@example.com',
            'dni' => '87654321',
            'password' => Hash::make('password'),
            'estado' => 'activo',
        ]);
    }
}
