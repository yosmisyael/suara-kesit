<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

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
}
