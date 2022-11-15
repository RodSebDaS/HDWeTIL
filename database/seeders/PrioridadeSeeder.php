<?php

namespace Database\Seeders;

use App\Models\Prioridade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrioridadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return [
            Prioridade::create([
                'nombre' => 'Sin Asignar',
                'descripcion' => 'Sin Asignar',
            ]),
            Prioridade::create([
                'nombre' => 'Baja',
                'descripcion' => 'Baja',
            ]),
            Prioridade::create([
                'nombre' => 'Media',
                'descripcion' => 'Media',
            ]),
            Prioridade::create([
                'nombre' => 'Alta',
                'descripcion' => 'Alta',
            ]),
            Prioridade::create([
                'nombre' => 'Crítica',
                'descripcion' => 'Crítica',
            ]),
        ];
    }
}
