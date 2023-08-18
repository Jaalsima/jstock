<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'document' => 'kjfasgoasp',
            'name' => 'Jaime',
            'email' => 'coderman1980@gmail.com',
            'address' => 'Medellín',
            'phone' => '1584ffih',
            'password' => Hash::make('coderman'),
            'status' => 'Disponible',
        ])->assignRole('developer');

        User::create([
            'document' => 'jkbdfbfbsd',
            'name' => 'John',
            'email' => 'john@example.com',
            'address' => 'Medellín',
            'phone' => '1584ffih',
            'password' => Hash::make('password'),
            'status' => 'Disponible',
        ])->assignRole('admin');

        User::create([
            'document' => 'dbvsbvsbpo',
            'name' => 'Mary',
            'email' => 'mary@example.com',
            'address' => 'Medellín',
            'phone' => '1584ffih',
            'password' => Hash::make('password'),
            'status' => 'Disponible',
        ])->assignRole('seller');

        User::factory(50)->create()->each(function ($user) {
            return $user->assignRole('guest');
        });
    }
}