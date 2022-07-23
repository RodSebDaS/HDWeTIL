<?php

namespace Database\Seeders;

use App\Models\Proceso;
use Illuminate\Database\Seeder;

class ProcesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proceso::factory()
            ->count(5)
            ->create();
    }
}
