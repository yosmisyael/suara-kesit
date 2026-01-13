<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;

class UserPostCreate extends Component
{
    public bool $isDirty = false;

    public string $draftId = '';


    #[Rule('required|string|max:255')]
    public string $title = '';

    #[Rule('required|string')]
    public string $content = '';

    #[Rule('required|int|exists:categories,id')]
    public int $categoryId = 0;

    public function mount(): void
    {
        if (!session()->has('draft_id')) {
            session()->put('draft_id', Str::uuid());
        }

        $this->draftId = Session::get('draft_id');
    }

    public function onStateChanges(?string $title, ?string $content): void
    {
        $this->isDirty = true;
        if ($title) $this->title = $title;
        if ($content) $this->content = $content;
    }

    public function save(): void
    {
        $this->validate();

        $post = new Post();
        $post->title = $this->title;
        $post->content = $this->content;
        $post->excerpt = $post->generateExcerpt();
        $post->author_id = auth()->user()->id;
        $post->category_id = $this->categoryId;

        $post->save();

        $this->dispatch('post-saved');

        $this->dispatch('notify',
            message: 'Post record has been created.',
            type: 'success'
        );

        $this->isDirty = false;
    }

    public function render(): View
    {
        return view('livewire.user.post-create', [
            'draftId' => $this->draftId,
            'categories' => Category::all(),
        ])->layout('components.layouts.user-with-sidebar', [
            'title' => 'Create Post',
            'user' => auth()->user(),
        ]);
    }
}
