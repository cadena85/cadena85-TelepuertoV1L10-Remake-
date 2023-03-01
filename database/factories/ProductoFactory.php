<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vehiculo'=>$this->faker->word(),
            'modelo'=>$this->faker->word(),
            'puertas'=>$this->faker->numberBetween(2, 4),
            'luces'=>$this->faker->sentence(),
            'direccion_asistida'=>$this->faker->boolean(),
            'ABS'=>$this->faker->boolean(),
            'Airbags'=>$this->faker->boolean(),
        ];
    }
}
//https://fakerphp.github.io/formatters/text-and-paragraphs/