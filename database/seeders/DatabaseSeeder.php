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

        $this->call(TipoSeeder::class);
        $this->call(ActivoSeeder::class);
        $this->call(ServicioSeeder::class);
        $this->call(PrioridadeSeeder::class);
        $this->call(FlujoValoreSeeder::class);
        $this->call(EstadoSeeder::class);
        //$this->call(PersonaSeeder::class);
        //$this->call(PermissionsSeeder::class);
         //$this->call(TeamSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(MarcaSeeder::class);
        $this->call(ModeloSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(PostSeeder::class);
    }
}
