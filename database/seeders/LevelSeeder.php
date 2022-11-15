<?php

namespace Database\Seeders;

use App\Models\level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        level::create([
            'posicion' => '1',
            'abreviatura' => '1N',
            'nombre' => 'Primer Nivel',
            'descripcion' => 'Primer Nivel',
        ]);

        level::create([
            'posicion' => '2',
            'abreviatura' => '2N',
            'nombre' => 'Segundo Nivel',
            'descripcion' => 'Segundo Nivel',
        ]);

        level::create([
            'posicion' => '3',
            'abreviatura' => '3N',
            'nombre' => 'Tercer Nivel',
            'descripcion' => 'Tercer Nivel',
        ]);

      /*   level::create([
            'abreviatura' => '4N',
            'nombre' => 'Cuarto Nivel',
            'descripcion' => 'Cuarto Nivel',
        ]); */
    }
}
