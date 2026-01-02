<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // member
        Role::create(['name' => 'member']);
        // journalist
        Role::create(['name' => 'journalist']);
        // editor
        Role::create(['name' => 'editor']);
        // administrator
        Role::create(['name' => 'admin']);
    }
}
