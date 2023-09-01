<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::create([
            'name' => 'Genius',
            'description' => 'Descripción Genius',
            'slug' =>     Str::slug('Genius'),
            'status' => fake()->randomElement(['Activo', 'Inactivo']),
        ]);

        Brand::create([
            'name' => 'Huntress',
            'description' => 'Descripción Huntress',
            'slug' =>     Str::slug('Huntress'),
            'status' => fake()->randomElement(['Activo', 'Inactivo']),
        ]);

        Brand::create([
            'name' => 'Best',
            'description' => 'Descripción Best',
            'slug' =>     Str::slug('Best'),
            'status' => fake()->randomElement(['Activo', 'Inactivo']),
        ]);

        Brand::create([
            'name' => 'Kingston',
            'description' => 'Descripción Kingston',
            'slug' =>     Str::slug('Kingston'),
            'status' => fake()->randomElement(['Activo', 'Inactivo']),
        ]);

        Brand::create([
            'name' => 'Fastest',
            'description' => 'Descripción Fastest',
            'slug' =>     Str::slug('Fastest'),
            'status' => fake()->randomElement(['Activo', 'Inactivo']),
        ]);
    }
}

