<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoInsumo;

class TipoInsumoSeeder extends Seeder
{
    public function run()
    {
        TipoInsumo::create([
            'tipo_insumo' => 'Tipo Insumo Básico',
            'costo_insumo' => 5000,
        ]);

        TipoInsumo::create([
            'tipo_insumo' => 'Tipo Insumo Intermedio',
            'costo_insumo' => 10000,
        ]);

        TipoInsumo::create([
            'tipo_insumo' => 'Tipo Insumo Avanzado',
            'costo_insumo' => 20000,
        ]);
    }
}

