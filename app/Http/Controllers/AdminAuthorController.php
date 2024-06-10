<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Response;

class AdminAuthorController extends Controller
{
    public function __construct(protected readonly UserService $userService)
    {

    }

    public function __invoke(): Response
    {
        $users = $this->userService->getByRole('author');
        return response()->view('pages.admin.user-author', [
            'title' => 'User | Author List',
            'users' => $users,
        ]);
    }
}
