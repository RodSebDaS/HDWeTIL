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
            'nombre' => 'Administrativo',
            'descripcion' => 'Administración',
        ]);
        Servicio::create([
            'nombre' => 'Aula Virtual',
            'descripcion' => 'Aula Virtual',
        ]);
        Servicio::create([
            'nombre' => 'Biblioteca',
            'descripcion' => 'Biblioteca',
        ]);
        Servicio::create([
            'nombre' => 'Comedor',
            'descripcion' => 'Comedor',
        ]);
        Servicio::create([
            'nombre' => 'Fotocopiadora',
            'descripcion' => 'Fotocopiadora',
        ]);
        Servicio::create([
            'nombre' => 'Secretaría',
            'descripcion' => 'Gestión Secretaría',
        ]);
        Servicio::create([
            'nombre' => 'SIU Guaraní',
            'descripcion' => 'Gestión del SIU Guaraní',
        ]);
    }
}
