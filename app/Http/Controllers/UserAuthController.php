<?php

namespace App\Http\Controllers;

use App\DTO\UserDTO;
use App\Http\Requests\UserAuthRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use App\Services\UserAuthService;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class UserAuthController extends Controller
{
    public function __construct(protected readonly UserAuthService $adminAuthService, protected readonly UserService $userService)
    {
    }

    public function register(): Response
    {
        return response()
            ->view('pages.user.register', [
                'title' => 'User Registration'
            ]);
    }

    public function store(UserRegisterRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $userDTO = new UserDTO($validated);

        $result = $this->userService->create($userDTO);

        if (!$result) return redirect()->back()->withErrors(['error' => 'An error occurred when registering user.'])->withInput();

        return redirect(route('user.auth.login'))
            ->with('success', 'You have successfully registered. Now please login with your new account.');
    }

    public function login(): Response
    {
        return response()->view('pages.user.login', [
            'title' => 'User Login'
        ]);
    }

    public function authenticate(UserAuthRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $result = $this->adminAuthService->login($validated['email'], $validated['password']);

        if (!$result)
            return redirect(route('user.auth.login'))
                ->withErrors(['error' => 'Email or password is wrong.'])
                ->withInput();

        /** @var User $user */
        $user = auth()->user();

        return redirect(route('user.profile', ['user' => '@' . $user->getAttribute('username')]));
    }

    public function logout(): RedirectResponse
    {
        $this->adminAuthService->logout();
        return redirect(route('user.auth.login'));
    }
}
