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
            'document'             => 'kjfasgoasp',
            $name1 = 'name'         => 'Jaime',
            'email'                => 'coderman1980@gmail.com',
            'address'              => 'Medellín',
            'phone'                => '1584ffih',
            'password'             => Hash::make('coderman'),
            'slug'                 => Str::slug($name1),
            'status'               => 'Activo',
            'profile_photo_path'   => 'users/' . fake()->image('public/storage/users', 640, 480, null, false),
        ])->assignRole('developer');

        User::create([
            'document'             => 'jkbdfbfbsd',
            $name2 = 'name'         => 'John',
            'email'                => 'john@example.com',
            'address'              => 'Medellín',
            'phone'                => '1584ffih',
            'password'             => Hash::make('password'),
            'slug'                 => Str::slug($name2),
            'status'               => 'Activo',
            'profile_photo_path'   => 'users/' . fake()->image('public/storage/users', 640, 480, null, false),
        ])->assignRole('admin');

        User::factory(50)->create()->each(function ($user) {
            return $user->assignRole('guest');
        });
    }
}