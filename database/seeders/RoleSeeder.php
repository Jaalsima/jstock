<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $developer = Role::create(['name' => 'developer']);
        $admin = Role::create(['name' => 'admin']);
        $seller = Role::create(['name' => 'seller']);
        $guest = Role::create(['name' => 'guest']);


        Permission::create(['name' => 'home'])->syncRoles([$developer, $admin, $seller, $guest]);
        Permission::create(['name' => 'users.index'])->syncRoles([$developer, $admin, $seller]);
        Permission::create(['name' => 'users.create'])->syncRoles([$developer, $admin, $seller]);
        Permission::create(['name' => 'users.store'])->syncRoles([$developer, $admin, $seller]);
        Permission::create(['name' => 'users.show'])->syncRoles([$developer, $admin]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$developer, $admin]);
        Permission::create(['name' => 'users.update'])->syncRoles([$developer, $admin]);
        Permission::create(['name' => 'users.destroy'])->syncRoles([$developer, $admin]);

        Permission::create(['name' => 'admin'])->syncRoles([$developer, $admin]);

        // $permissions = [
        //     'home',
        //     'users.index',
        //     'users.create',
        //     'users.store',
        //     'users.show',
        //     'users.edit',
        //     'users.update',
        //     'users.destroy',
        // ];

        // foreach ($permissions as $permission) {
        //     Permission::create(['name' => $permission]);
        // }
    }
}