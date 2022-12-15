<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'tipo_id' => '1',
            'cod_prosupuesto' => '435',
            'nombre' => 'Equipo educacional y recreativo',
            'descripcion' => 'Equipo educacional y recreativo',
            'vida_util' => '5',
            'amortizacion' => '20',
        ]);
        Categoria::create([
            'tipo_id' => '1',
            'cod_prosupuesto' => '435',
            'nombre' => 'Aparatos audio-visuales',
            'descripcion' => 'Aparatos audio-visuales',
            'vida_util' => '5',
            'amortizacion' => '20',
        ]);
        Categoria::create([
            'tipo_id' => '1',
            'nombre' => 'Muebles especializados para uso escolar',
            'descripcion' => 'Muebles especializados para uso escolar',
            'cod_prosupuesto' => '435',
            'vida_util' => '5',
            'amortizacion' => '20',

        ]);
        Categoria::create([
            'tipo_id' => '1',
            'cod_prosupuesto' => '435',
            'nombre' => 'Equipo educacional y recreativo',
            'descripcion' => 'Equipo educacional y recreativo',
            'vida_util' => '5',
            'amortizacion' => '20',
        ]);
        Categoria::create([
            'tipo_id' => '1',
            'cod_prosupuesto' => '435',
            'nombre' => 'Otros bienes similares',
            'descripcion' => 'Otros bienes similares',
            'vida_util' => '5',
            'amortizacion' => '20',
        ]);
        Categoria::create([
            'tipo_id' => '1',
            'cod_prosupuesto' => '435',
            'nombre' => 'Otros equipos destinados a la educación y recreación',
            'descripcion' => 'Otros equipos destinados a la educación y recreación',
            'vida_util' => '5',
            'amortizacion' => '20',
        ]);
        Categoria::create([
            'tipo_id' => '1',
            'cod_prosupuesto' => '436',
            'nombre' => 'Equipos para computación',
            'descripcion' => 'Equipos para computación',
            'vida_util' => '3',
            'amortizacion' => '33',
        ]);
        Categoria::create([
            'tipo_id' => '1',
            'cod_prosupuesto' => '436',
            'nombre' => 'Pantallas',
            'descripcion' => 'Pantallas',
            'vida_util' => '3',
            'amortizacion' => '33',
        ]);
        Categoria::create([
            'tipo_id' => '1',
            'cod_prosupuesto' => '436',
            'nombre' => 'Impresoras',
            'descripcion' => 'Impresoras',
            'vida_util' => '3',
            'amortizacion' => '33',
        ]);
        Categoria::create([
            'tipo_id' => '1',
            'cod_prosupuesto' => '436',
            'nombre' => 'Computadoras',
            'descripcion' => 'Computadoras',
            'vida_util' => '3',
            'amortizacion' => '33',
        ]);
        Categoria::create([
            'tipo_id' => '1',
            'cod_prosupuesto' => '436',
            'nombre' => 'Unidades de cinta',
            'descripcion' => 'Unidades de cinta',
            'vida_util' => '3',
            'amortizacion' => '33',
        ]);
        Categoria::create([
            'tipo_id' => '1',
            'cod_prosupuesto' => '436',
            'nombre' => 'Unidades de disco',
            'descripcion' => 'Unidades de disco',
            'vida_util' => '3',
            'amortizacion' => '33',

        ]);
        Categoria::create([
            'tipo_id' => '1',
            'cod_prosupuesto' => '436',
            'nombre' => 'Otros bienes similares',
            'descripcion' => 'Otros bienes similares',
            'vida_util' => '3',
            'amortizacion' => '33',
        ]);
    }
}