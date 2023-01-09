<?php

namespace Database\Factories;

use App\Models\Activo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activo>
 */
class ActivoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
                'nombre' => $this->faker->name(),
                'descripcion' => $this->faker->text(100),
                'fecha_adquisicion' => $this->faker->dateTime,
                'valor' => $this->faker->numberBetween(1,10000),
                'stock' => $this->faker->numberBetween(1,10),
                'categoria_id' => $this->faker->numberBetween(1,5),
                'marca_id' => $this->faker->numberBetween(1,5),
                'modelo_id' => $this->faker->numberBetween(1,5),
                'estado_id' => $this->faker->numberBetween(1,5),
                'area_id' => $this->faker->numberBetween(1,5),
                'cod_prosupuesto' => $this->faker->numberBetween(1,500),
                'categoria_nombre' => $this->faker->name(),
                'vida_util' => $this->faker->numberBetween(1,5),
                'amortizacion' => $this->faker->numberBetween(1,100),
            ];
    }
}
