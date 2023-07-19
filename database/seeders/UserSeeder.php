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
            'name' => 'Jaime',
            'email' => 'coderman1980@gmail.com',
            'password' => Hash::make('coderman'),
        ])->assignRole('developer');

        User::create([
            'name' => 'John',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
        ])->assignRole('admin');

        User::create([
            'name' => 'Mary',
            'email' => 'mary@example.com',
            'password' => Hash::make('password'),
        ])->assignRole('seller');

        User::factory(50)->create()->each(function ($user) {
            return $user->assignRole('guest');
        });
    }
}
