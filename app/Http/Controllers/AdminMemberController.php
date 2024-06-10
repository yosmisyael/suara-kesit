<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Response;

class AdminMemberController extends Controller
{
    public function __construct(protected readonly UserService $userService)
    {

    }

    public function __invoke(): Response
    {
        $users = $this->userService->getByRole('member');
        return response()->view('pages.admin.user-member', [
            'title' => 'User | Member List',
            'users' => $users,
        ]);
    }
}
