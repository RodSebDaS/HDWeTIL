<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return [

            Estado::create([
                'nombre' => 'Abierta',
                'descripcion' => 'Abierta',
            ]),
            Estado::create([
                'nombre' => 'En Curso',
                'descripcion' => 'En Curso',
            ]),
            Estado::create([
                'nombre' => 'Cerrada',
                'descripcion' => 'Cerrada',
            ]),
            Estado::create([
                'nombre' => 'Rechazada',
                'descripcion' => 'Rechazada',
            ]),
            Estado::create([
                'nombre' => 'Cancelada',
                'descripcion' => 'Cancelada',
            ]),
            Estado::create([
                'nombre' => 'Disponible',
                'descripcion' => 'Disponible',
            ]),
        ];
    }
}