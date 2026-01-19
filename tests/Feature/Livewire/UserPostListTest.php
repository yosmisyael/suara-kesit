<?php

use App\Enums\PostStatus;
use App\Livewire\UserPostList;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Livewire\Livewire;

/**
 * Setup & Configuration
 */
uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->category = Category::factory()->create(['name' => 'Technology']);
    $this->otherCategory = Category::factory()->create(['name' => 'Lifestyle']);
});

/**
 * Rendering & Auth
 */

test('component can be rendered', function () {
    Livewire::actingAs($this->user)
        ->test(UserPostList::class)
        ->assertStatus(200)
        ->assertSee('No posts found matching');
});

test('redirects guests to login', function () {
    // Assuming the route is protected by auth middleware
    $this->get(route('user.post.list'))
        ->assertRedirect(route('public.login'));
});

/**
 * Data Isolation & Display
 */

test('only displays posts belonging to the authenticated user', function () {
    $myPost = Post::factory()->create([
        'author_id' => $this->user->id,
        'title' => 'My Secret Post',
        'category_id' => $this->category->id,
    ]);

    $strangerPost = Post::factory()->create([
        'author_id' => User::factory()->create()->id,
        'title' => 'Stranger Post',
        'category_id' => $this->category->id,
    ]);

    Livewire::actingAs($this->user)
        ->test(UserPostList::class)
        ->assertSee($myPost->title)
        ->assertDontSee($strangerPost->title);
});

test('correctly displays status badges', function () {
    Post::factory()->create([
        'author_id' => $this->user->id,
        'status' => PostStatus::PUBLISHED,
        'category_id' => $this->category->id,
    ]);

    Livewire::actingAs($this->user)
        ->test(UserPostList::class)
        ->assertSee('Published')
        ->assertSeeHtml('badge success'); // Checking the CSS class logic
});

/**
 * Search & Filtering
 */

test('filters posts by search keyword', function () {
    Post::factory()->create([
        'author_id' => $this->user->id,
        'title' => 'Learn Laravel',
        'category_id' => $this->category->id,
    ]);

    Post::factory()->create([
        'author_id' => $this->user->id,
        'title' => 'Learn React',
        'category_id' => $this->category->id,
    ]);

    Livewire::actingAs($this->user)
        ->test(UserPostList::class)
        ->set('searchKeyword', 'Laravel') // Simulate typing
        ->assertSee('Learn Laravel')
        ->assertDontSee('Learn React');
});

test('filters posts by category', function () {
    Post::factory()->create([
        'author_id' => $this->user->id,
        'title' => 'Tech Post',
        'category_id' => $this->category->id,
    ]);

    Post::factory()->create([
        'author_id' => $this->user->id,
        'title' => 'Life Post',
        'category_id' => $this->otherCategory->id,
    ]);

    Livewire::actingAs($this->user)
        ->test(UserPostList::class)
        ->set('filter', $this->category->id)
        ->assertSee('Tech Post')
        ->assertDontSee('Life Post')
        // Test switching back to "All" (0)
        ->set('filter', 0)
        ->assertSee('Tech Post')
        ->assertSee('Life Post');
});

/*
 * Pagination logic
 */

test('paginates posts correctly', function () {
    Post::factory()->count(5)->create([
        'author_id' => $this->user->id,
        'category_id' => $this->category->id,
    ]);

    Livewire::actingAs($this->user)
        ->test(UserPostList::class)
        ->assertViewHas('posts', function ($posts) {
            return $posts->count() === 4;
        })
        ->assertSee('Next');
});

test('resets pagination when search keyword is updated', function () {
    Livewire::actingAs($this->user)
        ->test(UserPostList::class)
        ->set('paginators.page', 2)
        ->call('updateKeyword') // Simulate the action intended for search updates
        ->assertSet('paginators.page', 1);
});

/**
 * Session Persistence
 */

test('persists filters and search in the session', function () {
    Livewire::actingAs($this->user)
        ->test(UserPostList::class)
        ->set('searchKeyword', 'Persistent Search')
        ->set('filter', $this->category->id);

    // re-initialize the component (Simulate page reload)
    Livewire::actingAs($this->user)
        ->test(UserPostList::class)
        ->assertSet('searchKeyword', 'Persistent Search')
        ->assertSet('filter', $this->category->id);
});

/**
 * Empty State
 */

test('shows no results message with context', function () {
    Livewire::actingAs($this->user)
        ->test(UserPostList::class)
        ->set('searchKeyword', 'NonExistentXYZ')
        ->set('filter', $this->category->id)
        ->assertSee('No posts found matching')
        ->assertSee('NonExistentXYZ')
        ->assertSee($this->category->name);
});
