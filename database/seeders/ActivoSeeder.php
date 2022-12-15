<?php

namespace Database\Seeders;

use App\Models\Activo;
use App\Models\ProveedorActivos;
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
            'nombre' => 'PC Escritorio',
            'descripcion' => 'PCs',
            'fecha_adquisicion' => '2022-11-02 15:00:00',
            'valor' => '7500',
            'stock' => '3',
            'categoria_id' => '10',
            'marca_id' => '4',
            'modelo_id' => '6',
            'estado_id' => '12',
            'area_id' => '4',
            'cod_prosupuesto' => '436',
            'categoria_nombre' => 'Equipos para computación',
            'vida_util' => '3',
            'amortizacion' => '33',
        ]);
      
        Activo::create([
            'nombre' => 'Proyector',
            'descripcion' => 'Proyectores',
            'fecha_adquisicion' => '2022-10-02 10:00:00',
            'valor' => '4500',
            'stock' => '1',
            'categoria_id' => '7',
            'marca_id' => '8',
            'modelo_id' => '5',
            'estado_id' => '14',
            'area_id' => '5',
            'cod_prosupuesto' => '436',
            'categoria_nombre' => 'Equipos para computación',
            'vida_util' => '3',
            'amortizacion' => '33',
        ]);
    
        Activo::create([
            'nombre' => 'Servidor',
            'descripcion' => 'Servidores',
            'fecha_adquisicion' => '2022-05-12 08:30:00',
            'valor' => '30000',
            'stock' => '2',
            'categoria_id' => '7',
            'marca_id' => '9',
            'modelo_id' => '8',
            'estado_id' => '14',
            'area_id' => '6',
            'cod_prosupuesto' => '436',
            'categoria_nombre' => 'Equipos para computación',
            'vida_util' => '3',
            'amortizacion' => '33',
        ]);
    }
}
