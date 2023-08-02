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
            'name' => 'Categoría 1',
            'description' => 'Descripción 1',
            'status' => 'Estado 1',
        ]);

        Category::create([
            'name' => 'Categoría 2',
            'description' => 'Descripción 2',
            'status' => 'Estado 2',
        ]);

        Category::create([
            'name' => 'Categoría 3',
            'description' => 'Descripción 3',
            'status' => 'Estado 3',
        ]);
    }
}
