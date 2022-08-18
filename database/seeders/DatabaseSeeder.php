<?php

namespace Database\Seeders;

use Database\Factories\TeamFactory;
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

      
        $this->call(PrioridadeSeeder::class);
        $this->call(CanaleSeeder::class);
        $this->call(FlujoValoreSeeder::class);
        $this->call(EstadoSeeder::class);
        $this->call(PersonaSeeder::class);
        $this->call(DiagnosticoSeeder::class);
        //$this->call(ProcesoSeeder::class);
        $this->call(IncidenciaSeeder::class);
        //$this->call(PermissionsSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
    }
}
