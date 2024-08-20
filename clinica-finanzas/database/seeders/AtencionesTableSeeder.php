<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Atencion;

class AtencionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Atencion::create([
            'reserva_id' => 7,
            'valor_atencion' => 60000,
            'pago_profesional' => 30000,
            'tipoinsumo_id' => 1,
            'descripcion_atencion' => 'Esquince mano izquierda, Kinesiologia (10 sesiones)',
            'created_at' => '2024-07-01 10:00:00',
            'updated_at' => '2024-07-01 10:00:00',
        ]);
        
        Atencion::create([
            'reserva_id' => 8,
            'valor_atencion' => 60000,
            'pago_profesional' => 30000,
            'tipoinsumo_id' => 2,
            'descripcion_atencion' => 'Terapia física de rodilla',
            'created_at' => '2024-06-20 14:30:00',
            'updated_at' => '2024-06-20 14:30:00',
        ]);

    }
}
