@php use App\Enums\PostStatus; @endphp
<div>
    {{-- Searchbar and Filter --}}
    <div class="w-full flex gap-8">
        <span class="flex-3 inline-flex">
            <input
                wire:model.live.debounce.300ms="searchKeyword"
                type="text"
                class="border-2 border-gray-300 hover:border-black focus:border-black focus:outline-none focus:ring-0 p-3 w-full"
                placeholder="Search from your draft"
            >
            <button class="btn-primary px-3 py-0">
                <span wire:loading class="material-symbols-outlined mt-2">refresh</span>
                <span wire:loading.remove class="material-symbols-outlined mt-2">search</span>
            </button>
        </span>

        {{-- Filters --}}
        <span class="flex flex-1 relative select-none cursor-pointer" x-data="{ isDropdownOpen: false }"
              @click.outside="isDropdownOpen = false">
            <input type="hidden" wire:model="filter">
            <p class="flex items-center border-2 border-gray-300 hover:border-black focus:border-black focus:outline-none focus:ring-0 p-3 w-full {{ $filter == 0 ? 'text-gray-500' : 'text-black' }}"
               @click="isDropdownOpen = !isDropdownOpen"
            >
                @if($filter == 0)
                    Filter by category
                @else
                    {{ $categories->firstWhere('id', $filter)->name }}
                @endif
                <span class="ml-auto material-symbols-outlined rotate-90">chevron_right</span>
            </p>
            <ul x-show="isDropdownOpen" x-transition class="absolute top-full bg-white shadow-lg w-full"
                style="display: none">
                <li wire:click="$set('filter', 0)" @click="isDropdownOpen = false"
                    @class([
                        'px-4 py-2 rounded transition-colors cursor-pointer',
                        'bg-black text-white' => $filter === 0,
                        'hover:bg-gray-200' => $filter !== 0
                    ])
                >
                        All categories
                </li>
                @foreach($categories as $category)
                    <li wire:click="$set('filter', {{ $category->id }})" @click="isDropdownOpen = false"
                        @class([
                            'px-4 py-2 rounded transition-colors cursor-pointer',
                            'bg-black text-white' => $filter === $category->id,
                            'hover:bg-gray-200' => $filter !== $category->id
                        ])
                    >
                        {{ $category->name }}
                    </li>
                @endforeach
            </ul>
            <button class="btn-primary px-3 py-0" @click="isDropdownOpen = !isDropdownOpen">
                <span class="material-symbols-outlined mt-2">filter_list</span>
            </button>
        </span>
    </div>

    {{-- Post List --}}
    <section class="h-full flex flex-col gap-4 mt-8">
        @if($posts->count() > 0)
            @foreach($posts as $post)
                {{-- Card Item --}}
                <a href="{{ route('user.post.edit', ['postId' => $post->id]) }}"
                   class="px-4 py-4 hover:shadow-md hover:border-black border border-gray-300 block" wire:navigate>
                    <div class="flex gap-2 items-center justify-between">
                        <span class="badge dark">{{ $post->category->name }}</span>
                        <span class="block">
                            <span
                                @class([
                                    'badge',
                                    'success' => $post->status === PostStatus::PUBLISHED,
                                    'warning' => $post->status === PostStatus::PENDING,
                                    'default' => $post->status === PostStatus::DRAFT
                                        || $post->status === PostStatus::REJECTED,
                                    'danger' => $post->status === PostStatus::REVOKED,
                                ])
                            >
                                {{ ucfirst($post->status->value) }}
                            </span>
                            <span class="ml-2 text-sm text-gray-600">
                                Created on {{ $post->created_at->format('M d, Y') }}
                            </span>
                        </span>
                    </div>
                    <h1 class="text-2xl font-bold mt-2">{{ $post->title }}</h1>
                    <p class="mt-2 text-gray-600 leading-relaxed">{{ $post->excerpt }}</p>
                </a>
            @endforeach
            <div>
                {{ $posts->links('components.pagination') }}
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-gray-600">
                    No posts found matching
                    @if($searchKeyword && $filter !== 0)
                        keyword "{{ $searchKeyword }}" and category "{{ $categories->firstWhere('id', $filter)->name }}"
                    @elseif($searchKeyword)
                        "{{ $searchKeyword }}"
                    @elseif($filter !== 0)
                        Category "{{ $categories->firstWhere('id', $filter)->name }}"
                    @endif
                    .
                </p>
            </div>
        @endif
    </section>
</div>
