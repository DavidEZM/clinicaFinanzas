<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = ['nombres', 'apellidos', 'email', 'telefono', 'rut'];

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
