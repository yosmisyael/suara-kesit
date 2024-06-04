<?php

namespace App\Http\Controllers;

use App\Services\AuthorApplicationService;
use App\Services\TokenService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminAuthorController extends Controller
{
    public function __construct(protected TokenService $tokenService, protected AuthorApplicationService $authorApplicationService)
    {
    }

    public function index(): Response
    {
        return response()->view('pages.admin.user-application', [
            'title' => 'Applications | List',
            'applications' => $this->authorApplicationService->all()
        ]);
    }
}
