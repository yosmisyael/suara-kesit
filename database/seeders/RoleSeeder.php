<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
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

        /**
         * Permission definition: verb resource
         * verb:
         *      - create (create, edit, and delete own resource),
         *      - update (edit any resource)
         *      - manage (full access on any resource)
         * resource: posts, comments, users, tags
         */
        $permissions = [
            // post
            'create posts',
            'update posts',

            // comments
            'create comments',
            'update comments',
            'manage comments',

            // tags
            'create tags',
            'manage tags',

            // system
            'manage users',
            'manage categories',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // member
        $member = Role::firstOrCreate(['name' => 'member']);
        $member->syncPermissions([
            'create comments',
        ]);

        // writer
        $writer = Role::firstOrCreate(['name' => 'writer']);
        $writer->syncPermissions([
            'create posts',
            'create tags',
        ]);

        // editor
        $editor = Role::firstOrCreate(['name' => 'editor']);
        $editor->syncPermissions([
            'update posts',
            'update comments',
        ]);

        // administrator
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->syncPermissions([
            'manage users',
            'manage categories',
            'manage tags',
            'manage comments',
        ]);
    }
}
