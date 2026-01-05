<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        return view('pages.public.search', [
            'title' => 'Post - Latest News, Articles, and Events',
        ]);
    }

    public function show(): View
    {
        return view('pages.public.post', [
            'title' => 'Post Title',
        ]);
    }

    public function getByCategory(string $slug): View
    {
        $category = Category::query()->where('slug', $slug)->firstOrFail();

        return view('pages.public.posts', [
            'title' => $category->name,
        ]);
    }
}
