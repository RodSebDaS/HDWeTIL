<?php

namespace Database\Seeders;
use App\Models\Tipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipo::create([
            'nombre' => 'Consulta',
            'descripcion' => 'Consulta',
        ]);
        Tipo::create([
            'nombre' => 'Incidencia',
            'descripcion' => 'Incidencia',
        ]);
        Tipo::create([
            'nombre' => 'Queja',
            'descripcion' => 'Queja',
        ]);
        Tipo::create([
            'nombre' => 'Reclamo',
            'descripcion' => 'Reclamo',
        ]);
    }
}
