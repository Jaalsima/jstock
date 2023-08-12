<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Deportes',
            'description' => 'Descripción Deportes',
            'status' => 'Estado 1',
        ]);

        Category::create([
            'name' => 'Hogar',
            'description' => 'Descripción Hogar',
            'status' => 'Estado 2',
        ]);

        Category::create([
            'name' => 'Tecnología',
            'description' => 'Descripción Tecnología',
            'status' => 'Estado 3',
        ]);

        Category::create([
            'name' => 'Joyería',
            'description' => 'Descripción Joyería',
            'status' => 'Estado 3',
        ]);

        Category::create([
            'name' => 'Otros',
            'description' => 'Descripción Otros',
            'status' => 'Estado 3',
        ]);
    }
}
