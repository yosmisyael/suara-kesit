<?php

namespace App\Livewire;

use App\Models\Attachment;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostBody;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Attributes\Session as LivewireSession;
use Throwable;

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

    /**
     * @throws Throwable
     */
    public function save(): void
    {
        $this->validate();

        DB::transaction(function () {
            $post = Post::query()->create([
                'title' => $this->title,
                'category_id' => $this->categoryId,
                'author_id' => auth()->id(),
                'excerpt' => Post::generateExcerpt($this->content),
            ]);

            PostBody::query()->create([
                'post_id' => $post->id,
                'content' => $this->content,
            ]);

            Attachment::where('batch_id', $this->draftId)
                ->whereNull('post_id')
                ->update(['post_id' => $post->id]);
        });

        $this->dispatch('post-saved');

        $this->dispatch('notify',
            message: 'Post record has been created.',
            type: 'success'
        );

        $this->isDirty = false;
        session()->forget('draft_id');
        $this->reset(['title', 'content', 'categoryId', 'isDirty']);
        $this->mount();
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
