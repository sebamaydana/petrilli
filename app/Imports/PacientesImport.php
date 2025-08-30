<?php

namespace App\Imports;

use App\Models\Paciente;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithValidation;

class PacientesImport implements
    OnEachRow,
    WithHeadingRow,
    WithChunkReading,
    WithBatchInserts,
    SkipsEmptyRows,
    WithValidation
{
    private int $created = 0;
    private int $updated = 0;
    private int $restored = 0;
    private int $skipped = 0;

    public function onRow(Row $row): void
    {
        $r = $row->toArray();

        // Normalizar claves (por si vienen con espacios/mayúsculas)
        $r = array_change_key_case(array_map(fn ($v) => is_string($v) ? trim($v) : $v, $r), CASE_LOWER);

        $dni = isset($r['dni']) ? (int) $r['dni'] : null;
        if (!$dni) {
            $this->skipped++;
            return;
        }

        // Buscar incluso soft-deleted
        $paciente = Paciente::withTrashed()->firstWhere('dni', $dni);

        $data = [
            'nombre' => $r['nombre'] ?? null,
            'email'  => $r['email']  ?? null,
        ];

        // Hash de password solo si se provee una nueva en el Excel
        if (!empty($r['dni'])) {
            $data['password'] = Hash::make($r['dni']);
        }

        if ($paciente) {
            
            // No pisar password si no vino en el archivo
            $paciente->fill($data);
            $paciente->save();
            $this->updated++;
        } else {
            // Crear nuevo — si no vino password, usar una por defecto
            $data['dni'] = $dni;
            $data['password'] = Hash::make($dni);
            $data['estado'] = 'activo';

            Paciente::create($data);
            $this->created++;
        }
    }

    public function rules(): array
    {
        return [
            'dni'    => 'required|integer',
            'email'  => 'nullable|email',
            'nombre' => 'required|string',
            'estado' => 'nullable|in:activo,inactivo',
        ];
    }

    public function chunkSize(): int
    {
        return 500; // leer en chunks
    }

    public function batchSize(): int
    {
        return 500; // escribir en batch cuando aplica
    }

    public function getSummary(): array
    {
        return [
            'created'  => $this->created,
            'updated'  => $this->updated,
            'restored' => $this->restored,
            'skipped'  => $this->skipped,
        ];
    }
}
