<?php

namespace Database\Seeders;

use App\Models\Incidencia;
use Illuminate\Database\Seeder;

class IncidenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Incidencia::factory()
            ->count(5)
            ->create();
    }
}
