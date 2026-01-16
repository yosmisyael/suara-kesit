<?php

use App\Livewire\UserPostEdit;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

/**
 * Setup & Configuration
 */
uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->category = Category::factory()->create(['name' => 'Original Category']);
    $this->newCategory = Category::factory()->create(['name' => 'New Category']);

    $this->post = Post::factory()->create([
        'author_id' => $this->user->id,
        'category_id' => $this->category->id,
        'title' => 'Original Title',
        'content' => '<div>Original Content</div>',
    ]);
});

/**
 * Rendering & Initialization
 */

test('edit page can be rendered and loads post data correctly', function () {
    $this->actingAs($this->user)
        ->get(route('user.post.edit', ['postId' => $this->post->id]))
        ->assertStatus(200)
        ->assertSee('Edit Post')
        ->assertSee('Original Title')
        ->assertSeeLivewire(UserPostEdit::class);
});

test('mounts the component with the correct state', function () {
    Livewire::actingAs($this->user)
        ->test(UserPostEdit::class, ['postId' => $this->post->id])
        ->assertSet('title', 'Original Title')
        ->assertSet('categoryId', $this->category->id)
        ->assertSet('content', function ($value) {
            return str_contains($value, 'Original Content');
        })
        ->assertSet('isEditMode', false)
        ->assertSet('isDirty', false);
});

/**
 * Validation Scenarios
 */

test('validates required fields before saving', function () {
    Livewire::actingAs($this->user)
        ->test(UserPostEdit::class, ['postId' => $this->post->id])
        ->set('title', '')
        ->set('content', '')
        ->set('categoryId', 99999)
        ->call('save')
        ->assertHasErrors([
            'title' => 'required',
            'content' => 'required',
            'categoryId' => 'exists',
        ]);
});

test('enforces title character limits', function () {
    Livewire::actingAs($this->user)
        ->test(UserPostEdit::class, ['postId' => $this->post->id])
        ->set('title', str_repeat('A', 256))
        ->call('save')
        ->assertHasErrors(['title' => 'max']);
});

/**
 * Interaction Logic for Edit Mode, Discard, Sync
 */

test('updates internal state via JS bridge (onStateChanges)', function () {
    // simulates the JS Trix Draft Manager calling the Livewire method
    // to sync data while typing
    Livewire::actingAs($this->user)
        ->test(UserPostEdit::class, ['postId' => $this->post->id])
        ->call('onStateChanges', 'Synced Title', '<div>Synced Content</div>')
        ->assertSet('title', 'Synced Title')
        ->assertSet('content', '<div>Synced Content</div>')
        ->assertSet('isDirty', true);
});

test('discards changes and reverts to original post data', function () {
    Livewire::actingAs($this->user)
        ->test(UserPostEdit::class, ['postId' => $this->post->id])
        ->set('isEditMode', true)
        // make changes
        ->set('title', 'Changed Title')
        ->set('content', 'Changed Content')
        ->set('categoryId', $this->newCategory->id)
        // call discard
        ->call('discard')
        ->assertSet('isEditMode', false)
        ->assertSet('title', 'Original Title')
        ->assertSet('categoryId', $this->category->id)
        ->assertSet('content', function ($val) {
            return str_contains((string)$val, 'Original Content');
        });
});

/**
 * Persistence & Events
 */

test('updates the post database record successfully', function () {
    $updatedTitle = 'Updated Senior Guide';
    $updatedContent = '<div>Updated content for testing.</div>';

    Livewire::actingAs($this->user)
        ->test(UserPostEdit::class, ['postId' => $this->post->id])
        ->set('title', $updatedTitle)
        ->set('content', $updatedContent)
        ->set('categoryId', $this->newCategory->id)
        ->call('save')
        ->assertHasNoErrors()
        ->assertDispatched('post-saved') // Check event dispatch
        ->assertDispatched('notify') // Check notification
        ->assertSet('isEditMode', false)
        ->assertSet('isDirty', false);

    $this->assertDatabaseHas('posts', [
        'id' => $this->post->id,
        'title' => $updatedTitle,
        'category_id' => $this->newCategory->id,
    ]);

    // verify rich text content
    $freshPost = Post::find($this->post->id);
    expect((string)$freshPost->content)->toContain('Updated content for testing')
        ->and($freshPost->excerpt)->not->toBeEmpty();
});

test('handles partial updates via onStateChanges', function () {
    // Sometimes JS sends null for one field if it hasn't changed
    Livewire::actingAs($this->user)
        ->test(UserPostEdit::class, ['postId' => $this->post->id])
        ->set('title', 'Keep This Title')
        ->call('onStateChanges', null, 'New Content Only')
        ->assertSet('title', 'Keep This Title') // Should not be overwritten by null
        ->assertSet('content', 'New Content Only');
});
