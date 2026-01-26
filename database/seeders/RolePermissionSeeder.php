<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
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
         *      - view|create|update|delete
         *
         * resource: posts, comments, users, tags, etc
         */
        $permissions = [
            // posts
            'view posts',
            'create posts',
            'update posts',
            'delete posts',

            // comments
            'view comments',
            'create comments',
            'update comments',
            'delete comments',

            // tags
            'view tags',
            'create tags',
            'update tags',
            'delete tags',

            // system management
            'publish posts',
            'revoke posts',
            'revoke comments',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // member
        $member = Role::firstOrCreate(['name' => 'member']);
        $member->syncPermissions([
            'view comments',
            'create comments',
            'update comments',
            'delete comments',
        ]);

        // writer
        $writer = Role::firstOrCreate(['name' => 'writer']);
        $writer->syncPermissions([
            'view posts',
            'create posts',
            'update posts',
            'delete posts',
            'create tags',
        ]);

        // editor
        $editor = Role::firstOrCreate(['name' => 'editor']);
        $editor->syncPermissions([
            'publish posts',
            'revoke comments',
        ]);

        // administrator
        Role::firstOrCreate(['name' => 'admin']);
    }
}
