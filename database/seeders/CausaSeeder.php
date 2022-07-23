<?php

namespace Database\Seeders;

use App\Models\Causa;
use Illuminate\Database\Seeder;

class CausaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Causa::factory()
            ->count(5)
            ->create();
    }
}
