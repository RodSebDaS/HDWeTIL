<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run()
    {
      Team::create([
        'name' => 'Admin',
        'user_id' => 1,
        'personal_team' => true,
      ]);
    }
}
