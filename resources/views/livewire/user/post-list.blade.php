@php use App\PostStatus; @endphp
<div>
    {{-- Searchbar --}}
    <form class="w-full flex">
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
    </form>

    {{-- Post List --}}
    <section class="flex flex-col gap-8 mt-12">
        @forelse($posts as $post)
            {{-- Card Item --}}
            <a href="" class="px-8 py-4 hover:shadow-lg border-l-2 block">
                <div class="flex gap-2 items-center">
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
                    <span class="text-sm text-gray-600">
                        Created on {{ $post->created_at->format('M d, Y') }}
                    </span>
                </div>
                <h1 class="text-2xl font-bold mt-2">{{ $post->title }}</h1>
                <p class="mt-4 text-gray-600 leading-relaxed">{{ $post->excerpt }}</p>
            </a>
        @empty
            <div class="text-center py-12">
                <p class="text-gray-600">No posts found matching "{{ $searchKeyword }}".</p>
            </div>
        @endforelse
    </section>
</div>
