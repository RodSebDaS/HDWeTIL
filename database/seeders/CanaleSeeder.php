<?php

namespace Database\Seeders;

use App\Models\Canale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CanaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {return [
        Canale::create([
            'nombre' => 'Email',
            'descripcion' => 'Email',
        ]),
        Canale::create([
            'nombre' => 'Página Web',
            'descripcion' => 'Página Web',
        ]),
        Canale::create([
            'nombre' => 'Presencial',
            'descripcion' => 'Presencial',
        ]),
        Canale::create([
            'nombre' => 'Teléfono',
            'descripcion' => 'Teléfono',
        ]),
    ];
    }
}
