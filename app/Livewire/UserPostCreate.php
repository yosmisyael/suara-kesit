<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;

class UserPostCreate extends Component
{
    public bool $isDirty = true;

    #[Rule('required|string|max:255')]
    public string $title = '';
    #[Rule('required|string')]
    public string $content = '';

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
        $post->category_id = 4;

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
            'batchId' => Str::uuid(),
        ])->layout('components.layouts.user-with-sidebar', [
            'title' => 'Create Post',
            'user' => auth()->user(),
        ]);
    }
}
