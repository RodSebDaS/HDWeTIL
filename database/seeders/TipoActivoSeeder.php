<?php

namespace Database\Seeders;
use App\Models\Tipo;
use App\Models\TipoActivo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoActivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoActivo::create([
            'nombre' => 'Hardware',
            'descripcion' => 'Hardware',
        ]);
        TipoActivo::create([
            'nombre' => 'Software',
            'descripcion' => 'Software',
        ]);
    }
}
