<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User([
            'name' => 'alpha',
            'email' => 'alpha@test.com',
            'password' => bcrypt('password'),
            'username' => 'alpha',
        ]);
        $user->save();
        $user->assignRole('member');
    }
}
