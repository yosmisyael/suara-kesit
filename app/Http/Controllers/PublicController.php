<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PublicController extends Controller
{
    public function __construct(protected PostService $postService)
    {
    }

    public function index(): Response
    {
        $posts = $this->postService->getPublished();

        return response()
            ->view('pages.public.home', [
                'title' => 'Home',
                'posts' => $posts
            ]);
    }

    public function list(Request $request): Response
    {
        $posts = $this->postService->getPublished();

        return response()
            ->view('pages.public.posts', [
                'title' => 'Post List',
                'posts' => $posts
            ]);
    }

    public function show(string $id): Response
    {
//        $post = $this->postService->getById($id);

        return response()
            ->view('pages.public.post', [
                'title' => 'Post title',
//                'post' => $post
            ]);
    }
}
