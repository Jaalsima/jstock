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
            'brand_id' => fake()->numberBetween(1, 5),
            'category_id' => fake()->numberBetween(1, 5),
            'name' => $name,
            'description' => fake('es_ES')->text(),
            'current_stock' => fake()->randomNumber(3, false),
            'measurement_unit' =>fake('es_ES')->text(),
            'purchase_price' => fake()->randomFloat(2, 10, 100000),
            'selling_price' => fake()->randomFloat(2, 12, 120000),
            'slug' => Str::slug($name),
            'status' => fake()->randomElement(['Disponible', 'No Disponible']),
            'expiration' => fake()->date('Y_m_d'),
            'observations' => fake('es_ES')->text(),
            'image' => 'products/' . fake()->image('public/storage/products', 640, 480, null, false),
        ];
    }
}
