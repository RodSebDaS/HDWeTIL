<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Marca;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Marca::create([
            'nombre' => 'ACER',
            'descripcion' => 'Acer',
        ]);
         Marca::create([
            'nombre' => 'AMD',
            'descripcion' => 'Amd',
        ]);
        Marca::create([
            'nombre' => 'ASUS',
            'descripcion' => 'Asus',
        ]);
        Marca::create([
            'nombre' => 'BANGHÓ',
            'descripcion' => 'Banghó',
        ]);
        Marca::create([
            'nombre' => 'BROTHER',
            'descripcion' => 'Brother',
        ]);
        Marca::create([
            'nombre' => 'CISCO',
            'descripcion' => 'Cisco',
        ]);
        Marca::create([
            'nombre' => 'DELL',
            'descripcion' => 'Dell',
        ]);
        Marca::create([
            'nombre' => 'EPSON',
            'descripcion' => 'Seiko Epson Corporation',
        ]);
        Marca::create([
            'nombre' => 'GADNIC',
            'descripcion' => 'Gadnic',
        ]);
        Marca::create([
            'nombre' => 'HP',
            'descripcion' => 'Hewlett-Packard',
        ]);
        Marca::create([
            'nombre' => 'INTEL',
            'descripcion' => 'INTEL',
        ]);
        Marca::create([
            'nombre' => 'KINGSTON',
            'descripcion' => 'Kingston',
        ]);
        Marca::create([
            'nombre' => 'LENOVO',
            'descripcion' => 'Lenovo',
        ]);
        Marca::create([
            'nombre' => 'LG',
            'descripcion' => 'LG',
        ]);
        Marca::create([
            'nombre' => 'MICROSOFT',
            'descripcion' => 'Microsoft',
        ]);
        Marca::create([
            'nombre' => 'MIKROTIK',
            'descripcion' => 'MikroTik',
        ]);
        Marca::create([
            'nombre' => 'SONY',
            'descripcion' => 'SONY',
        ]);
        Marca::create([
            'nombre' => 'TOSHIBA',
            'descripcion' => 'Toshiba',
        ]);
        Marca::create([
            'nombre' => 'TP-LINK',
            'descripcion' => 'TP-Link',
        ]);
    }
}
