<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesional extends Model
{
    protected $table = 'profesionales';

    protected $fillable = ['nombres', 'apellidos', 'tipoespecialidad_id', 'email', 'telefono', 'rut'];

    public function tipoEspecialidad()
    {
        return $this->belongsTo(TipoEspecialidad::class, 'tipoespecialidad_id');
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
