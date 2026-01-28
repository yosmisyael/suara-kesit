<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Attributes\Session as LivewireSession;

class UserPostCreate extends Component
{
    #[LivewireSession('draft_isDirty')]
    public bool $isDirty = false;

    public string $draftId = '';

    #[LivewireSession('draft_title')]
    #[Rule('required|string|max:255')]
    public string $title = '';

    #[LivewireSession('draft_content')]
    #[Rule('required|string')]
    public string $content = '';

    #[LivewireSession('draft_category_id')]
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

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'category_id' => $this->categoryId,
            'author_id' => auth()->id(),
        ]);

        $this->dispatch('post-saved');

        $this->dispatch('notify',
            message: 'Post record has been created.',
            type: 'success'
        );

        $this->isDirty = false;

        session()->forget('draft_id');
        $this->reset(['title', 'content', 'categoryId', 'isDirty']);
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
