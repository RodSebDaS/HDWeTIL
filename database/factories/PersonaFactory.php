<?php

namespace Database\Factories;

use App\Models\Estado;
use App\Models\Persona;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Persona::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'tipo_id' => $this->faker->numberBetween(1,2),
            'nombre' => $this->faker->name(),
            'apellido' => $this->faker->lastName(),
            'dni' => $this->faker->randomNumber(),
            'cuit' => $this->faker->randomNumber(),
            'descripcion' => Str::random(10),
            'area_id' => $this->faker->numberBetween(1,5),
            'activa' => true,
            'estado_id' => '6',
        ];
    }
}
