<?php

namespace Database\Seeders;

use App\Models\Incidencia;
use Illuminate\Database\Seeder;

class IncidenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Incidencia::create([
            'titulo' => 'Prueba',
            'sla' => 19/05/2022,
            'descripcion' => 'Esto es una prueba',
            'canal_id' => 2,
            'especificacionservicio_id' => 1,
            'prioridad_id' => 1,
            'estado_id' => 1,
            'flujovalor_id' => 1,
            'activa' => true,
            'persona_id' => 1,
            'user_id' => 1,
        ]);

        Incidencia::factory(5)
            ->create();
    }
}
