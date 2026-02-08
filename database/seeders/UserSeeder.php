<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'name' => 'John Journalist',
            'email' => 'user1@test.com',
            'password' => 'password',
        ]);

        $user->assignRole('member');

        $user = User::create([
            'name' => 'John Journalist',
            'email' => 'writer1@test.com',
            'password' => 'password',
        ]);

        $user->assignRole('writer', 'member');

        $user = User::create([
            'name' => 'John Editor',
            'email' => 'editor1@test.com',
            'password' => 'password',
        ]);

        $user->assignRole('writer', 'editor', 'member');

        $user = User::create([
            'name' => 'John Admin',
            'email' => 'admin@test.com',
            'password' => 'password',
        ]);

        $user->assignRole('admin');
    }
}
