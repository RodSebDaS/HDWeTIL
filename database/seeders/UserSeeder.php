<?php

namespace Database\Seeders;

use App\Models\Team;
use \App\Models\User; 
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Rodrigo',
            'email' => 'rsddasilva@gmail.com',
            'password'  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'current_rol' => 'Admin',
        ])->assignRole('Admin');

        User::create([
            'name' => 'María González',
            'email' => 'mariag@gmail.com',
            'password'  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'current_rol' => 'Alumno',
        ])->assignRole('Alumno');

        User::create([
                'name' => 'José Acosta',
                'email' => 'joseacosta@gmail.com',
                'password'  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'current_rol' => 'Mesa de Ayuda',
        ])->assignRole('Mesa de Ayuda');

        User::create([
            'name' => 'Carlos Lopez',
            'email' => 'carlosl@gmail.com',
            'password'  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'current_rol' => 'Soporte Técnico',
        ])->assignRole('Soporte Técnico');

        User::create([
            'name' => 'Juan Lopez',
            'email' => 'jlopez@gmail.com',
            'password'  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'current_rol' => 'Alumno',
        ])->assignRole('Alumno');
        
        User::factory(15)->create();
        //Team::factory(4)->create();
          // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
