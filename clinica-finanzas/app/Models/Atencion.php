<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atencion extends Model
{
    use HasFactory;

    protected $table = 'atenciones';

    protected $fillable = ['reserva_id', 'valor_atencion', 'pago_profesional', 'tipoinsumo_id', 'descripcion_atencion'];

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }
    
    public function tipoInsumo()
    {
        return $this->belongsTo(TipoInsumo::class, 'tipoinsumo_id');
    }
    
}
