<?php

namespace App\Imports;

use App\Models\Paciente;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;

class PacientesImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // Saltar la primera fila si contiene encabezados
        $dataRows = $rows->skip(5);        

        foreach ($dataRows as $row) {

            // Validar que row[4] no esté vacío y que esté dentro del rango permitido para el campo dni (entero, único)
            // Suponiendo que el campo dni es un entero, validamos que sea numérico y que esté en el rango de enteros de MySQL
            // El rango de INT en MySQL es de -2147483648 a 2147483647, pero normalmente los DNI son positivos y de hasta 8 dígitos en Argentina
            if (
                empty($row[2]) ||
                empty($row[4]) ||
                !is_numeric($row[4]) ||
                $row[4] < 0 ||
                $row[4] > 2147483647
            ) {
                continue;
            }

            Paciente::updateOrCreate([
                'dni' => $row[4],
            ], [
                'nombre' => $row[2],
                'email' => $row[7],
                'direccion' => $row[5],
                'estado' => 'activo',
                'password' => Hash::make($row[4]),
            ]);
        }
    }
}
