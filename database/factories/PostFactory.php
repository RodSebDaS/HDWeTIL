<?php

namespace Database\Factories;

use App\Http\Livewire\Admin\UsersIndex;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Database\Seeders\UserSeeder;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tipo_id' => $this->faker->randomNumber,
            'titulo' => $this->faker->text(100),
            'sla' => $this->faker->dateTime,
            'descripcion' => $this->faker->text,
            'canal_id' => $this->faker->randomNumber,
            'servicio_id' => $this->faker->randomNumber,
            'activo_id' => $this->faker->randomNumber,
            'prioridad_id' => $this->faker->randomNumber,
            'estado_id' => $this->faker->randomNumber,
            'flujovalor_id' => $this->faker->randomNumber,
            'activa' => $this->faker->boolean,
            'persona_id' => 1,
            'user_id' => 1,
        ];
    }
}
