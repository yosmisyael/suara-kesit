<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // permissions
        Permission::create(['name' => 'write-article']);
        Permission::create(['name' => 'post-comment']);
        Permission::create(['name' => 'edit-comment']);
        Permission::create(['name' => 'delete-comment']);

        // roles
        Role::create(['name' => 'member'])
            ->givePermissionTo(['post-comment', 'edit-comment', 'delete-comment']);
        Role::create(['name' => 'author'])
            ->givePermissionTo('write-article');
    }
}
