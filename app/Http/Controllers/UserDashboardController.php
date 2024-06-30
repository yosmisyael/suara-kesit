<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserDashboardController extends Controller
{
    public function __invoke(Request $request): Response
    {
        return response()
            ->view('pages.user.dashboard', [
                'title' => 'User Dashboard',
            ]);
    }
}
