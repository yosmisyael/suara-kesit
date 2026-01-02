<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        return view('pages.public.post', [
            'title' => 'Post - Latest News, Articles, and Events',
        ]);
    }
}
