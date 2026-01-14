<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Illuminate\View\View;
use Livewire\Attributes\Session;
use Livewire\Component;
use Livewire\WithPagination;

class UserPostList extends Component
{
    use WithPagination;

    #[Session]
    public int $filter = 0;

    #[Session]
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
            ->with('category')
            ->search($this->searchKeyword)
            ->withCategory($this->filter)
            ->latest()
            ->select(['id', 'title', 'excerpt', 'status', 'created_at', 'updated_at', 'category_id'])
            ->paginate(4);

        return view('livewire.user.post-list', [
            'posts' => $posts,
            'categories' => Category::all(),
        ])->layout('components.layouts.user-with-sidebar', [
            'title' => 'User Post List',
            'user' => $user,
        ]);
    }
}
