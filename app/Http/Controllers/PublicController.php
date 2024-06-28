<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PublicController extends Controller
{
    public function index(): Response
    {
        return response()
            ->view('pages.public.home', [
                'title' => 'Home'
            ]);
    }
}
