<?php

namespace Database\Factories;

use App\Http\Livewire\Admin\UsersIndex;
use App\Models\Incidencia;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Database\Seeders\UserSeeder;

class IncidenciaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Incidencia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->text(100),
            'sla' => $this->faker->dateTime,
            'descripcion' => $this->faker->text,
            'canal_id' => $this->faker->randomNumber,
            'especificacionservicio_id' => $this->faker->randomNumber,
            'prioridad_id' => $this->faker->randomNumber,
            'estado_id' => $this->faker->randomNumber,
            'flujovalor_id' => $this->faker->randomNumber,
            'activa' => $this->faker->boolean,
            'persona_id' => 1,
            'user_id' => 1,
        ];
    }
}
