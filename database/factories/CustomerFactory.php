<?php

namespace Database\Factories;

use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
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
            'document' => Str::random(10),
            'name'    => $name,
            'email'   => fake('es_ES')->unique()->safeEmail(),
            'address' => fake('es_ES')->address(),
            'phone'   => fake('es_ES')->phoneNumber(),
            'slug'    => Str::slug($name),
            'status'  => fake('es_ES')->randomElement(['Activo', 'Inactivo']),
            'image'   => 'customers/' . fake()->image('public/storage/customers', 640, 480, null, false),
        ];
    }
}
