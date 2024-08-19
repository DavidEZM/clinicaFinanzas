<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = ['paciente_id', 'profesional_id', 'fecha_reserva'];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function profesional()
    {
        return $this->belongsTo(Profesional::class);
    }

    public function atencion()
    {
        return $this->hasOne(Atencion::class);
    }
}
