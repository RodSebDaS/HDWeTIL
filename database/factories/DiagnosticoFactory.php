<?php

namespace Database\Factories;

use App\Models\Diagnostico;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiagnosticoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Diagnostico::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->text(255),
            'descripcion' => $this->faker->text(255),
        ];
    }
}
