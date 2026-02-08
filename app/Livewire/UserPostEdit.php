<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use App\Services\EditorialService;
use Illuminate\View\View;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Mockery\Exception;
use Throwable;

class UserPostEdit extends Component
{
    #[Url]
    public string $postId;

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
        $this->post = Post::with(['category', 'keywords', 'postBody', 'editorials'])
            ->findOrFail((int)$this->postId);

        $this->authorize('view', $this->post);

        $this->title = $this->post->title;
        $this->categoryId = $this->post->category_id;
        $this->content = $this->post->postBody->content;
    }

    public function onStateChanges(?string $title, ?string $content): void
    {
        $this->isDirty = true;
        if ($title !== null) $this->title = $title;
        if ($content !== null) $this->content = $content;
    }

    public function discard(): void
    {
        $this->isEditMode = false;
        $this->title = $this->post->title;
        $this->content = $this->post->postBody->content;
        $this->categoryId = $this->post->category_id;

        $this->dispatch('post-content-reset', content: $this->content);
    }

    protected function updatePostRecord(): void
    {
        $this->validate();

        $this->post->title = $this->title;
        $this->post->postBody->content = $this->content;
        $this->post->category_id = $this->categoryId;
        $this->post->excerpt = Post::generateExcerpt($this->content);
        $this->post->save();
    }

    protected function fireNotification(string $type, string $message): void
    {
        // $this->dispatch('post-saved');
        $this->dispatch('notify', type: $type, message: $message);
    }

    public function save(): void
    {
        $this->updatePostRecord();
        $this->fireNotification('success', 'Post has been updated.');
        $this->isDirty = false;
        $this->isEditMode = false;
    }

    /**
     * @throws Throwable
     */
    public function submit(EditorialService $editorialService): void
    {
        try {
            $editorialService->submitForReview(auth()->user(), $this->post);

            $this->fireNotification('success', 'Post has been submitted.');

        } catch (Throwable $exception) {
            $this->fireNotification('warning', $exception->getMessage());
        }
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
