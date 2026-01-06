<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Session;
use Symfony\Component\HttpFoundation\RedirectResponse;

class UserAuthController extends Controller
{
    public function register(): View
    {
        return view('pages.auth.register', [
            'title' => 'Become an Insider'
        ]);
    }


    public function login(): View
    {
        return view('pages.auth.login', [
            'title' => 'User Login'
        ]);
    }

    public function handleRegister(UserRegisterRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $user = User::query()->create($validated);

        $user->assignRole('member');

        return redirect(route('public.login'))
            ->with('success', 'You have been registered. Please login.');
    }

    public function handleLogin(UserLoginRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $result = Auth::attempt([
            'email' => $validated['email'],
            'password' => $validated['password']
        ]);

        if (!$result) {
            return redirect(route('public.login'))
                ->withErrors(['auth' => 'Credentials doesn\'t match our records.'])
                ->withInput();
        }

        return redirect(route('user.dashboard'));
    }

    public function handleLogout(): RedirectResponse
    {
        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();
        return redirect(route('public.login'));
    }
}
