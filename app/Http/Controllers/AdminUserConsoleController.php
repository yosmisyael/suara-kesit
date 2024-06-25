<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminUserConsoleController extends Controller
{
    public function __construct(protected UserService $userService)
    {

    }

    public function __invoke(Request $request): Response
    {
        $users = $this->userService->all();
        $members = $users->filter(function ($user) {
            return $user->roles->first()->name === 'member';
        });
        $authors = $users->filter(function ($user) {
            return $user->roles->first()->name === 'author';
        });

        return response()->view('pages.admin.user-console', [
            'title' => 'User | Console',
            'members' => $members,
            'authors' => $authors,
        ]);
    }
}
