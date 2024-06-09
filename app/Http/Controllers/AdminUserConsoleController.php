<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class AdminUserConsoleController extends Controller
{
    public function __construct(protected UserService $userService)
    {

    }

    public function __invoke(Request $request)
    {
        $users = $this->userService->all();
        $members = $this->userService->getByRole('member');
        $authors = $this->userService->getByRole('author');
        return response()->view('pages.admin.user-console', [
            'title' => 'User | Console',
            'users' => $users,
            'members' => $members,
            'authors' => $authors,
        ]);
    }
}
