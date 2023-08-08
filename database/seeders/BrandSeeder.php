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
            'name' => 'Holita',
            'description' => 'Descripción 1',
            'status' => 'Estado 1',
        ]);

        Brand::create([
            'name' => 'Marca 2',
            'description' => 'Descripción 2',
            'status' => 'Estado 2',
        ]);

        Brand::create([
            'name' => 'Marca 3',
            'description' => 'Descripción 3',
            'status' => 'Estado 3',
        ]);
    }
}