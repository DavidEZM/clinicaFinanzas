<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEspecialidad extends Model
{
    use HasFactory;

    protected $table = 'tipoespecialidades';

    protected $fillable = ['nombre_especialidad'];

    public function profesionales()
    {
        return $this->hasMany(Profesional::class);
    }
}
