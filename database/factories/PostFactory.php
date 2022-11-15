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
            'tipo_id' => $this->faker->numberBetween(1,5),
            'titulo' => $this->faker->text(100),
            'sla' => $this->faker->dateTime,
            'descripcion' => $this->faker->text,
            'canal_id' =>  $this->faker->numberBetween(1,5),
            'servicio_id' =>  $this->faker->numberBetween(1,5),
            'activo_id' => $this->faker->numberBetween(1,5),
            'prioridad_id' =>  $this->faker->numberBetween(1,5),
            'estado_id' =>  $this->faker->numberBetween(1,5),
            'flujovalor_id' =>  $this->faker->numberBetween(1,5),
            'activa' => $this->faker->boolean,
            'persona_id' =>  $this->faker->numberBetween(1,5),
            'user_id' =>  $this->faker->numberBetween(1,5),
            'user_id_update_at' => $this->faker->numberBetween(1,5),
            'level' => $this->faker->numberBetween(1,3),
            'calificacion' => $this->faker->numberBetween(1,10),
        ];
    }
}
