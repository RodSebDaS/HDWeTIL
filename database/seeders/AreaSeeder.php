<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create([
            'nombre' => 'Secretaría',
            'descripcion' => 'Secretaría',
            'ubicacion' => '',
        ]);
        Area::create([
            'nombre' => 'Dirección',
            'descripcion' => 'Dirección',
            'ubicacion' => '',
        ]);
        Area::create([
            'nombre' => 'Administración',
            'descripcion' => 'Administración',
            'ubicacion' => '',
        ]);
        Area::create([
            'nombre' => 'Laboratorio ARSO',
            'descripcion' => 'Laboratorio ARSO',
            'ubicacion' => '',
        ]);
        Area::create([
            'nombre' => 'Aula Magna',
            'descripcion' => 'Aula Magna',
            'ubicacion' => '',
        ]);
        Area::create([
            'nombre' => 'Comedor',
            'descripcion' => 'Comedor',
            'ubicacion' => '',
        ]);
    }
}
