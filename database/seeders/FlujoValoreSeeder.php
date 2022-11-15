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
                'posicion' => '1',
                'descripcion' => 'Sin Atender',
            ]),
            FlujoValore::create([
                'nombre' => 'Diagnóstico',
                'posicion' => '2',
                'descripcion' => 'Diagnóstico',
            ]),
            FlujoValore::create([
                'nombre' => 'Implementación',
                'posicion' => '3',
                'descripcion' => 'Implementación',
            ]),
            FlujoValore::create([
                'nombre' => 'Solucionada',
                'posicion' => '4',
                'descripcion' => 'Solucionada',
            ]),
            FlujoValore::create([
                'nombre' => 'Sin Resolver',
                'posicion' => '5',
                'descripcion' => 'Sin Resolver',
            ]),
            FlujoValore::create([
                'nombre' => 'Fin',
                'posicion' => '6',
                'descripcion' => 'Fin',
            ]),
        ];
    }
}
