<?php

namespace Database\Factories;

use App\Models\Causa;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CausaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Causa::class;

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
