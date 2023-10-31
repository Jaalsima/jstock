<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'document'             => '71318371',
            'name'                 => 'Jaime',
            'email'                => 'coderman@gmail.com',
            'address'              => 'Medellín',
            'phone'                => '1584ffih',
            'password'             => Hash::make('coderman'),
            'slug'                 => Str::slug('Jaime'),
            'status'               => 'Activo',
            'profile_photo_path'   => 'users/' . fake()->image('public/storage/users', 640, 480, null, false),
        ])->assignRole('developer');

        User::create([
            'document'             => '1012452587',
            'name'                 => 'John',
            'email'                => 'john@example.com',
            'address'              => 'Medellín',
            'phone'                => '1584ffih',
            'password'             => Hash::make('password'),
            'slug'                 => Str::slug('John'),
            'status'               => 'Activo',
            'profile_photo_path'   => 'users/' . fake()->image('public/storage/users', 640, 480, null, false),
        ])->assignRole('seller');

        User::factory(5)->create()->each(function ($user) {
            return $user->assignRole('guest');
        });
    }
}
