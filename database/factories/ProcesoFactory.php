<?php

namespace Database\Factories;

use App\Models\Proceso;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProcesoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proceso::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'descripcion' => $this->faker->text(255),
            'incidencia_id' => \App\Models\Incidencia::factory(),
            'flujoValor_id' => $this->faker->randomNumber,
            'estado_id' => $this->faker->randomNumber,
            'rol_id' => $this->faker->randomNumber,
            'user_id' => $this->faker->randomNumber,
            'comentario' => $this->faker->text(255),
            'calificacion' => $this->faker->text(20),
        ];
    }
}
