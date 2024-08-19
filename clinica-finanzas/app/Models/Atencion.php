<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atencion extends Model
{
    use HasFactory;

    protected $fillable = ['reserva_id', 'valor_atencion', 'pago_profesional', 'costo_insumos'];

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }
}
