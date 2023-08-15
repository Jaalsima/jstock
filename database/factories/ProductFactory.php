<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $name = fake('es_ES')->name();
        return [
            'brand_id' => $this->faker->numberBetween(1, 5),
            'category_id' => $this->faker->numberBetween(1, 5),
            'name' => $name,
            'description' => fake('es_ES')->realText(),
            'purchase_price' => $this->faker->randomFloat(2, 10, 100000),
            'selling_price' => $this->faker->randomFloat(2, 20, 200000),
            'slug' => Str::slug($name),
            'expiration' => fake()->date(),
            'observations' => fake('es_ES')->realText(200),
            'status' => $this->faker->randomElement(['Disponible', 'No Disponible', 'En Espera']),
            'image' => 'products/' . fake()->image('public/storage/products', 640, 480, null, false),
        ];
    }
}