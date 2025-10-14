<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Estudio extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'estudios';

    protected $guarded = [
        'id',
    ];

    protected $appends = ['pdf_url'];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function getPdfUrlAttribute()
    {
        if ($this->pdf) {
            return asset('storage/' . $this->pdf);
        }
        return null;
    }

    protected static function booted(): void
    {
        static::creating(function (Estudio $estudio): void {
            if (empty($estudio->public_token)) {
                $estudio->public_token = Str::random(48);
            }
        });
    }
}
