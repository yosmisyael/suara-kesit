<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use App\Rules\TrixContentRequired;
use Illuminate\View\View;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;

class UserPostEdit extends Component
{
    #[Url]
    public int $postId;

    #[Rule('required|string|max:255')]
    public string $title = '';

    #[Rule('required|string')]
    public string $content = '';

    #[Rule('required|int|exists:categories,id')]
    public int $categoryId = 0;

    public ?Post $post = null;

    public bool $isEditMode = false;

    public bool $isDirty = false;

    public function mount(): void
    {
        $this->post = Post::with(['category', 'keywords'])
            ->withRichText('content')
            ->find($this->postId);

        $this->title = $this->post->title;
        $this->content = $this->post->content;
        $this->categoryId = $this->post->category_id;
    }

    public function onStateChanges(?string $title, ?string $content): void
    {
        $this->isDirty = true;
        if ($title !== null) $this->title = $title;
        if ($content !== null) $this->content = $content;
        \Log::info('onStateChanges called');
        \Log::info('received content:');
        \Log::info($content);
        \Log::info('component content now:');
        \Log::info($this->content);
    }

    public function discard(): void
    {
        $this->isEditMode = false;
        $this->title = $this->post->title;
        $this->content = $this->post->content;
        $this->categoryId = $this->post->category_id;
    }

    public function save(): void
    {
        $this->validate();

        $this->post->title = $this->title;
        $this->post->content = $this->content;
        $this->post->category_id = $this->categoryId;
        $this->post->excerpt = $this->post->generateExcerpt();
        $this->post->save();

        $this->dispatch('post-saved');
        $this->dispatch('notify', message: 'Post has been updated.');

        $this->isDirty = false;
        $this->isEditMode = false;
    }

    public function render(): View
    {
        return view('livewire.user.post-edit', [
            'id' => $this->postId,
            'post' => $this->post,
            'categories' => Category::all(),
        ])->layout('components.layouts.user-with-sidebar', [
            'title' => 'Edit Post',
            'user' => auth()->user(),
        ]);
    }
}
