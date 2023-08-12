<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

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
            'status' => 'Estado 1',
        ]);

        Brand::create([
            'name' => 'Huntress',
            'description' => 'Descripción Huntress',
            'status' => 'Estado 2',
        ]);

        Brand::create([
            'name' => 'Best',
            'description' => 'Descripción Best',
            'status' => 'Estado 3',
        ]);

        Brand::create([
            'name' => 'Kingston',
            'description' => 'Descripción Kingston',
            'status' => 'Estado 3',
        ]);

        Brand::create([
            'name' => 'Fastest',
            'description' => 'Descripción Fastest',
            'status' => 'Estado 3',
        ]);
    }
}

