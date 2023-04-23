<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        Servicio::create([
        'nombre' => 'Atención al Usuario',
        'descripcion' => 'Atención al Usuario',
        'estado_id' => 15,
        'valor' => 0,
        ]);
        Servicio::create([
            'nombre' => 'Aula Virtual',
            'descripcion' => 'Aula Virtual',
            'estado_id' => 15,
            'valor' => 0,
        ]);
        Servicio::create([
            'nombre' => 'Equipos Laboratorio',
            'descripcion' => 'Equipos Laboratorio',
            'estado_id' => 15,
            'valor' => 0 ,
        ]);
        Servicio::create([
            'nombre' => 'Equipos de Redes',
            'descripcion' => 'Equipos de Redes',
            'estado_id' => 15,
            'valor' => 0,
        ]);
        Servicio::create([
            'nombre' => 'SIU Guaraní',
            'descripcion' => 'Gestión del SIU Guaraní',
            'estado_id' => 15,
            'valor' => 0,
        ]);
        Servicio::create([
            'nombre' => 'Usabilidad del Sistema',
            'descripcion' => 'Usabilidad del Sistema',
            'estado_id' => 15,
            'valor' => 0,
        ]);
    }
}
