<?php

namespace App\Http\Controllers;

use App\Services\AuthorApplicationService;
use App\Services\TokenService;
use Illuminate\Http\RedirectResponse;
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

    public function indexToken(): Response
    {
        return response()->view('pages.admin.user-application-token', [
            'title' => 'Applications | Token',
            'tokens' => $this->tokenService->all()
        ]);
    }

    public function generateToken(): Response|RedirectResponse
    {
        $token = $this->tokenService->create();

        if (!$token)
            return redirect(route('admin.application.token'))
                ->withErrors(['error' => 'An error occurred when generating token.']);

        return response()->view('pages.admin.user-application-token-create', [
            'title' => 'Applications | Generate Token',
            'token' => $token
        ]);
    }

    public function show(string $id): Response
    {
        return response()->view('pages.admin.user-application-review', [
            'title' => 'Applications | Review',
            'application' => $this->authorApplicationService->getById($id)
        ]);

    }

//    public function handleApprove()
//    {
//
//    }
//
//    public function handleReject()
//    {
//
//    }
}
