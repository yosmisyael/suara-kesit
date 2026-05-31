@php use App\Enums\PostStatus; @endphp
<div class="px-5 md:px-10 xl:px-36 py-12">
    {{-- Analytics Cards --}}
    <section class="grid grid-cols-4 gap-4">
        <div class="text-lg flex justify-between items-center rounded-b-lg border-t-4 shadow-md px-4 py-8">
            <h2 class="font-bold">Open Submissions</h2>
            <p class="text-4xl font-bold">10</p>
        </div>
        <div class="text-lg flex justify-between items-center rounded-b-lg border-t-4 shadow-md px-4 py-8">
            <h2 class="font-bold">Published Posts</h2>
            <p class="text-4xl font-bold">16</p>
        </div>
        <div class="text-lg flex justify-between items-center rounded-b-lg border-t-4 shadow-md px-4 py-8">
            <h2 class="font-bold">Revoked Posts</h2>
            <p class="text-4xl font-bold">8</p>
        </div>
        <div class="text-lg flex justify-between items-center rounded-b-lg border-t-4 shadow-md px-4 py-8">
            <h2 class="font-bold">Reviewed</h2>
            <p class="text-4xl font-bold">10</p>
        </div>
    </section>

    {{-- Submissions List --}}
    <section class="h-full flex flex-col gap-4 mt-8">
        @if($submissions->count() > 0)
            @foreach($submissions as $submission)
                {{-- Card Item --}}
                <a href=""
                   class="px-4 py-4 hover:shadow-md hover:border-black border border-gray-300 block" wire:navigate>
                    <div class="flex gap-2 items-center justify-between">
                        <span class="badge dark">{{ $submission->post->category->name }}</span>
                        <span class="block">
                            <span
                                @class([
                                    'badge',
                                    'success' => $submission->post->status === PostStatus::PUBLISHED,
                                    'warning' => $submission->post->status === PostStatus::PENDING,
                                    'default' => $submission->post->status === PostStatus::DRAFT
                                        || $submission->post->status === PostStatus::REJECTED,
                                    'danger' => $submission->post->status === PostStatus::REVOKED,
                                ])
                            >
                                {{ ucfirst($submission->post->status->value) }}
                            </span>
                            <span class="ml-2 text-sm text-gray-600">
                                Submitted by {{ $submission->post->author->name }} on {{ $submission->created_at->format('M d, Y') }}
                            </span>
                        </span>
                    </div>
                    <h1 class="text-2xl font-bold mt-2">{{ $submission->post->title }}</h1>
                    <p class="mt-2 text-gray-600 leading-relaxed">{{ $submission->post->excerpt }}</p>
                </a>
            @endforeach
            <div>
                {{ $submissions->links('components.pagination') }}
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-gray-600">
                    No submission need to review.
                </p>
            </div>
        @endif
    </section>
</div>
