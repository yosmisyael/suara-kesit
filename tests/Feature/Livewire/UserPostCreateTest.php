<?php

use App\Livewire\UserPostCreate;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Livewire;

/**
 * Setup & Configuration
 */
uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->category = Category::factory()->create();
});

/**
 * Component Rendering & Lifecycle
 */

test('create post page can be rendered', function () {
    Livewire::actingAs($this->user)
        ->test(UserPostCreate::class)
        ->assertStatus(200)
        ->assertSee('Choose post category')
        ->assertSee('Title of the content');
});

test('redirects non-authenticated users', function () {
    $this->get(route('user.post.create'))
        ->assertRedirect(route('public.login'));
});

test('generates a draft_id in session on mount if one does not exist', function () {

    Livewire::actingAs($this->user)
        ->test(UserPostCreate::class)
        ->assertSet('draftId', function ($value) {
            return Str::isUuid($value);
        });

    expect(session()->has('draft_id'))->toBeTrue();
});

test('preserves the existing draft_id from session', function () {
    $existingUuid = (string) Str::uuid();
    session()->put('draft_id', $existingUuid);

    Livewire::actingAs($this->user)
        ->test(UserPostCreate::class)
        ->assertSet('draftId', $existingUuid);
});

/**
 * Validation Scenarios
 */

test('save action requires title, content, and category', function () {
    Livewire::actingAs($this->user)
        ->test(UserPostCreate::class)
        ->call('save')
        ->assertHasErrors([
            'title' => 'required',
            'content' => 'required',
            'categoryId' => 'exists',
        ]);
});

test('enforces max length on title', function () {
    Livewire::actingAs($this->user)
        ->test(UserPostCreate::class)
        ->set('title', str_repeat('a', 256))
        ->call('save')
        ->assertHasErrors(['title' => 'max']);
});

it('validates category existence', function () {
    Livewire::actingAs($this->user)
        ->test(UserPostCreate::class)
        ->set('title', 'Valid Title')
        ->set('content', 'Valid Content')
        ->set('categoryId', 99999) // Non-existent ID
        ->call('save')
        ->assertHasErrors(['categoryId' => 'exists']);
});

/**
 * Functionality & Persistence
 */

test('can create a post with valid data', function () {
    $title = 'Senior Developer Guide';
    $content = '<p>Integration testing is vital.</p>';

    Livewire::actingAs($this->user)
        ->test(UserPostCreate::class)
        ->set('title', $title)
        ->set('content', $content)
        ->set('categoryId', $this->category->id)
        ->call('save')
        ->assertHasNoErrors();

    $this->assertDatabaseHas('posts', [
        'title' => $title,
        'author_id' => $this->user->id,
        'category_id' => $this->category->id,
    ]);

    $post = Post::where('title', $title)->first();
    expect($post->excerpt)->not->toBeEmpty();
});

test('dispatches success events after saving', function () {
    Livewire::actingAs($this->user)
        ->test(UserPostCreate::class)
        ->set('title', 'Event Test')
        ->set('content', 'Content')
        ->set('categoryId', $this->category->id)
        ->call('save')
        ->assertDispatched('post-saved')
        ->assertDispatched('notify', function ($event, $data) {
            return $data['message'] === 'Post record has been created.'
                && $data['type'] === 'success';
        });
});

test('resets isDirty state after save', function () {
    Livewire::actingAs($this->user)
        ->test(UserPostCreate::class)
        ->set('title', 'Dirty Test')
        ->set('content', 'Content')
        ->set('categoryId', $this->category->id)
        ->set('isDirty', true) // Simulate dirty state
        ->call('save')
        ->assertSet('isDirty', false);
});

/**
 * JS Bridge & Hydration (onStateChanges)
 */

test('updates internal state when Javascript triggers onStateChanges', function () {
    // This simulates the Javascript Editor calling the Livewire method
    // to sync data without a full form submission
    Livewire::actingAs($this->user)
        ->test(UserPostCreate::class)
        ->call('onStateChanges', 'Synced Title', 'Synced Content')
        ->assertSet('title', 'Synced Title')
        ->assertSet('content', 'Synced Content')
        ->assertSet('isDirty', true);
});

test('handles partial updates in onStateChanges', function () {
    // Sometimes only one field updates
    Livewire::actingAs($this->user)
        ->test(UserPostCreate::class)
        ->set('title', 'Original Title')
        ->call('onStateChanges', null, 'Updated Content')
        ->assertSet('title', 'Original Title') // Should remain unchanged
        ->assertSet('content', 'Updated Content');
});
