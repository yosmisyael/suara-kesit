<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePostRequest;
use App\Services\PostService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class AdminPostController extends Controller
{
    public function __construct(protected PostService $postService)
    {
    }

    public function index(): Response
    {
        return response()->view('pages.admin.posts', [
            'title' => 'Post | Published Post List',
            'posts' => $this->postService->getPublished()
        ]);
    }

    public function edit(string $id): Response
    {
        return response()->view('pages.admin.post', [
            'title' => 'Post | Edit Post',
            'post' => $this->postService->getById($id)
        ]);
    }

    public function update(UpdatePostRequest $request, string $id): RedirectResponse
    {
        $validated = $request->validated();

        $result = $this->postService->update($id, [
            'is_published' => $validated['is_published']
        ]);

        if (!$result)
            return redirect(route('admin.post.update', ['id' => $id]))
                ->withErrors(['error' => 'An error occurred when unpublishing post.']);

        return redirect(route('admin.post.index'))
            ->with('success', 'Post has been taken down.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $this->postService->delete($id);

        return redirect(route('admin.post.index'))->with('success', 'Post has been deleted.');
    }
}
