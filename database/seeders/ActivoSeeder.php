<?php

namespace Database\Seeders;

use App\Models\Activo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activo::create([
            'nombre' => 'Access Point',
            'descripcion' => 'Access Points',
            'stock' => '3',
        ]);
        Activo::create([
            'nombre' => 'PC',
            'descripcion' => 'PCs',
            'stock' => '3',
        ]);
        Activo::create([
            'nombre' => 'Proyector',
            'descripcion' => 'Proyectores',
            'stock' => '3',
        ]);
        Activo::create([
            'nombre' => 'Router',
            'descripcion' => 'Routers',
            'stock' => '3',
        ]);
        Activo::create([
            'nombre' => 'Servidor',
            'descripcion' => 'Servidores',
            'stock' => '3',
        ]);
        Activo::create([
            'nombre' => 'Switch',
            'descripcion' => 'Switchs',
            'stock' => '3',
        ]);
        Activo::create([
            'nombre' => 'Teclado',
            'descripcion' => 'Teclados',
            'stock' => '3',
        ]);
    }
}
