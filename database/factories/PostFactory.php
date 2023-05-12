<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id' => rand(1,10),//con 10 usarios
            'titulo' => $this->faker->sentence,//oracion al azar
            'slug' => $this->faker->slug,
            'contenido' => $this->faker->text(500),//texto de 500 caracteres
        ];
    }
}
