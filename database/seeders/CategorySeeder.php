<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name'        => 'Deportes',
            'description' => 'Descripción Deportes',
            'slug'        => Str::slug('Deportes'),
            'status'      => fake()->randomElement(['Activo', 'Inactivo']),
        ]);

        Category::create([
            'name'        => 'Hogar',
            'description' => 'Descripción Hogar',
            'slug'        => Str::slug('Hogar'),
            'status'      => fake()->randomElement(['Activa', 'Inactiva']),
        ]);

        Category::create([
            'name'        => 'Tecnología',
            'description' => 'Descripción Tecnología',
            'slug'        => Str::slug('Tecnología'),
            'status'      => fake()->randomElement(['Activa', 'Inactiva']),
        ]);

        Category::create([
            'name'        => 'Joyería',
            'description' => 'Descripción Joyería',
            'slug'        => Str::slug('Joyería'),
            'status'      => fake()->randomElement(['Activa', 'Inactiva']),
        ]);

        Category::create([
            'name' => 'Otros',
            'description' => 'Descripción Otros',
            'slug' =>     Str::slug('Otros'),
            'status' => fake()->randomElement(['Activa', 'Inactiva']),
        ]);
    }
}
