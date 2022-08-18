<?php

namespace Database\Seeders;

use App\Models\FlujoValore;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlujoValoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return [
            FlujoValore::create([
                'nombre' => 'Sin Atender',
                'descripcion' => 'Sin Atender',
            ]),
            FlujoValore::create([
                'nombre' => 'Atendida',
                'descripcion' => 'Atendida',
            ]),
            FlujoValore::create([
                'nombre' => 'Diagnóstico',
                'descripcion' => 'Diagnóstico',
            ]),
            FlujoValore::create([
                'nombre' => 'Implementación',
                'descripcion' => 'Implementación',
            ]),
            FlujoValore::create([
                'nombre' => 'Solucionada',
                'descripcion' => 'Solucionada',
            ]),
        ];
    }
}
