<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminAuthRequest;
use App\Services\AdminAuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminAuthController extends Controller
{
    public function __construct(protected readonly AdminAuthService $adminAuthService)
    {
    }

    public function login(): Response
    {
        return response()->view('pages.admin.login', [
            'title' => 'Administrator Login'
        ]);
    }

    public function authenticate(AdminAuthRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $result = $this->adminAuthService->login($validated['username'], $validated['password']);

        if (!$result)
            return redirect(route('admin.auth.login'))
                ->withErrors(['error' => 'Username or password is wrong.'])
                ->withInput();

        return redirect(route('admin.dashboard'));
    }

    public function logout(): RedirectResponse
    {
        $this->adminAuthService->logout();
        return redirect(route('admin.auth.login'));
    }
}
