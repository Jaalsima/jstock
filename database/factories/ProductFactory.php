<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake('es_ES')->firstName(),
            'description' => fake('es_ES')->realText(),
            'category_id' => $this->faker->numberBetween(1, 5),
            'brand_id' => $this->faker->numberBetween(1, 5),
            'purchase_price' => $this->faker->randomFloat(2, 10, 100000),
            'selling_price' => $this->faker->randomFloat(2, 20, 200000),
            'status' => $this->faker->randomElement(['Disponible', 'No Disponible', 'En Espera']),
        ];
    }
}
