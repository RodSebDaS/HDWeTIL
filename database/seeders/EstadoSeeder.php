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
                'nombre' => 'Atendida',
                'descripcion' => 'Atendida',
            ]),
            Estado::create([
                'nombre' => 'Derivada',
                'descripcion' => 'Derivada',
            ]),
            Estado::create([
                'nombre' => 'Cerrada',
                'descripcion' => 'Cerrada',
            ]),
            Estado::create([
                'nombre' => 'Cancelada',
                'descripcion' => 'Cancelada',
            ]),
            Estado::create([
                'nombre' => 'Rechazada',
                'descripcion' => 'Rechazada',
            ]),
            Estado::create([
                'nombre' => 'Editada',
                'descripcion' => 'Editada',
            ]),
            Estado::create([
                'nombre' => 'Eliminada',
                'descripcion' => 'Eliminada',
            ]),
        ];
    }
}