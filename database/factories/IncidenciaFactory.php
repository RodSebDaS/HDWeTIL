<?php

namespace Database\Factories;

use App\Models\Incidencia;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'nombre' => $this->faker->text(255),
            'sla' => $this->faker->dateTime,
            'descripcion' => $this->faker->text,
            'canal_id' => $this->faker->randomNumber,
            'servicio_id' => $this->faker->randomNumber,
            'prioridad_id' => $this->faker->randomNumber,
            'estado_id' => $this->faker->randomNumber,
            'flujoValor_id' => $this->faker->randomNumber,
            'nivelActuacion_id' => $this->faker->randomNumber,
            'activa' => $this->faker->boolean,
            'persona_id' => \App\Models\Persona::factory(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
