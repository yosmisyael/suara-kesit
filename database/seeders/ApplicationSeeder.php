<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Token;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::with('roles')->whereHas('roles', function ($query) {
            $query->where('name', 'member');
        })->first();

        $token = Token::query()->first();

        $application = new Application([
            'user_id' => $user->id,
            'token' => $token->token
        ]);

        $application->save();
    }
}
