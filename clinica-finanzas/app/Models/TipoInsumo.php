<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoInsumo extends Model
{
    use HasFactory;

    protected $table = 'tipoinsumos';

    protected $fillable = ['tipo_insumo', 'costo_insumo'];

    public function atenciones()
    {
        return $this->hasMany(Atencion::class, 'tipoinsumo_id');
    }
}

