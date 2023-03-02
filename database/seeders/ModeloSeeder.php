<?php

namespace Database\Seeders;

use App\Models\Modelo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModeloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modelo::create([
            'marca_id' => '11',
            'nombre' => 'i3',
            'descripcion' => 'i3',
        ]);
        Modelo::create([
            'marca_id' => '11',
            'nombre' => 'i5',
            'descripcion' => 'i5',
        ]);
        Modelo::create([
            'marca_id' => '11',
            'nombre' => 'i7',
            'descripcion' => 'i7',
        ]);
        Modelo::create([
            'marca_id' => '8',
            'nombre' => 'PowerLite E20',
            'descripcion' => 'PowerLite E20',
        ]);
        Modelo::create([
            'marca_id' => '9',
            'nombre' => 'StartPro Wifi 7000',
            'descripcion' => 'StartPro Wifi 7000',
        ]);
        Modelo::create([
            'marca_id' => '4',
            'nombre' => 'BOLD PRO E40',
            'descripcion' => 'BOLD PRO E40',
        ]);
        Modelo::create([
            'marca_id' => '7',
            'nombre' => 'Poweredge T40',
            'descripcion' => 'Poweredge T40',
        ]);
        Modelo::create([
            'marca_id' => '10',
            'nombre' => 'Proliant Ml 110',
            'descripcion' => 'Proliant Ml 110',
        ]);

        Modelo::create([
            'marca_id' => '12',
            'nombre' => 'A400',
            'descripcion' => 'A400',
        ]);

        Modelo::create([
            'marca_id' => '6',
            'nombre' => 'Cbs220',
            'descripcion' => 'Cbs220',
        ]);

        Modelo::create([
            'marca_id' => '16',
            'nombre' => 'RB951Ui-2HnD',
            'descripcion' => '',
        ]);

        Modelo::create([
            'marca_id' => '19',
            'nombre' => 'C80',
            'descripcion' => 'C80',
        ]);
        Modelo::create([
            'marca_id' => '8',
            'nombre' => 'M3170',
            'descripcion' => 'M3170',
        ]);
        Modelo::create([
            'marca_id' => '1',
            'nombre' => 'X515EA',
            'descripcion' => 'X515EA',
        ]);
    }
}
