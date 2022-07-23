<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // // Adding an admin user
        // $user = \App\Models\User::factory()
        //     ->count(1)
        //     ->create([
        //         'email' => 'admin@admin.com',
        //         'password' => \Hash::make('admin'),
        //     ]);

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

        //$this->call(PermissionsSeeder::class);

        $this->call(CausaSeeder::class);
        $this->call(IncidenciaSeeder::class);
        $this->call(PersonaSeeder::class);
        $this->call(ProcesoSeeder::class);
    }
}
