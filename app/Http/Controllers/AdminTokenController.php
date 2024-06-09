<?php

namespace App\Http\Controllers;

use App\Services\TokenService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminTokenController extends Controller
{
    public function __construct(protected TokenService $tokenService)
    {
    }

    public function index(): Response
    {
        return response()->view('pages.admin.tokens', [
            'title' => 'Applications | Token List',
            'tokens' => $this->tokenService->all()
        ]);
    }

    public function store(): Response|RedirectResponse
    {
        $token = $this->tokenService->create();

        if (!$token)
            return redirect(route('admin.application.tokens'))
                ->withErrors(['error' => 'An error occurred when generating token.']);

        return response()->view('pages.admin.token-create', [
            'title' => 'Applications | Generate Token',
            'token' => $token
        ]);
    }
}
