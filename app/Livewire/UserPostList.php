<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class UserPostList extends Component
{
    use WithPagination;

    public string $searchKeyword = '';

    public function updateKeyword(): void
    {
        $this->resetPage();
    }

    public function render(): View
    {
        $user = auth()->user();

        $posts = Post::query()
            ->withAuthor($user)
            ->search($this->searchKeyword)
            ->latest()
            ->select(['id', 'title', 'excerpt', 'status', 'created_at', 'updated_at'])
            ->paginate(10);

        return view('livewire.user.post-list', [
            'posts' => $posts,
        ])->layout('components.layouts.user-with-sidebar', [
            'title' => 'User Post List',
            'user' => $user,
        ]);
    }
}
