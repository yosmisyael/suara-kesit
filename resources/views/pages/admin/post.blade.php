@php use App\Models\Post; use Carbon\Carbon; /** @var Post $post */@endphp
<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-dashboard-shell>
        <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-5">
            <header
                class="md:col-span-3 mb-5">
                <h1 class="text-5xl font-black md:text-7xl">{{ explode('|', $title)[1] }}</h1>
            </header>
            <div
                class="md:col-span-2 w-full space-y-2">
                <h2 class="text-3xl font-bold text-primary rounded-lg w-fit">
                    Post
                </h2>
                <article
                    class="shadow-lg rounded-lg p-5 bg-white to-pink-50 p-5 mx-auto">
                    <header class="text-4xl font-semibold text-center">{{ $post->title }}</header>
                    <main>{{ $post->content }}</main>
                </article>
            </div>

            <div class="col-span-1 space-y-5" style="height: fit-content">
                <div class="space-y-2">
                    <h2 class="text-3xl font-bold text-primary rounded-lg w-fit">Detail
                    </h2>
                    <div
                        class="rounded-lg p-5 bg-white shadow-lg text-slate-700">
                        <h4 class="text-xl font-medium mt-5">Author Details</h4>
                        <div class="space-y-5">
                            <div class="grid grid-cols-3 items-center">
                                <div class="col-span-1 block text-sm font-medium text-gray-700">Email</div>
                                <div class="col-span-2 w-full rounded-md bg-white p-3 border-[1px] shadow-sm">
                                    {{ $post->user->email }}
                                </div>
                            </div>
                            <div class="grid grid-cols-3 items-center">
                                <div class="col-span-1 block text-sm font-medium text-gray-700">Name</div>
                                <div class="col-span-2 w-full rounded-md bg-white p-3 border-[1px] shadow-sm">
                                    {{ $post->user->name }}
                                </div>
                            </div>
                            <div class="grid grid-cols-3 items-center">
                                <div class="col-span-1 block text-sm font-medium text-gray-700">Username</div>
                                <div class="col-span-2 w-full rounded-md bg-white p-3 border-[1px] shadow-sm">
                                    {{ $post->user->username }}
                                </div>
                            </div>
                            <div class="grid grid-cols-3 items-center">
                                <div class="col-span-1 block text-sm font-medium text-gray-700">Registration Date</div>
                                <div class="col-span-2 w-full rounded-md bg-white p-3 border-[1px] shadow-sm">
                                    {{ Carbon::parse($post->user->created_at)->format('d F Y') }}
                                </div>
                            </div>
                        </div>
                        <h4 class="text-xl font-medium mt-5">Post Credentials</h4>
                        <div class="space-y-5">
                            <div class="grid grid-cols-3 items-center">
                                <div class="col-span-1 block text-sm font-medium text-gray-700">Post ID</div>
                                <div class="col-span-2 w-full rounded-md bg-white p-3 border-[1px] shadow-sm">
                                    {{ $post->id }}
                                </div>
                            </div>
                            <div class="grid grid-cols-3 items-center">
                                <div class="col-span-1 block text-sm font-medium text-gray-700">Published by
                                    submission
                                </div>
                                <div
                                    class="col-span-2 w-full rounded-md bg-white p-3 border-[1px] shadow-sm flex justify-between">
                                    {{ $post->submissions->count() > 0 ? $post->submissions->last()->id : 'Direct Published'}}
                                    @if($post->submissions->count() > 0)
                                        <a href="{{ route('admin.review.show', ['id' => $post->submissions->last()->id]) }}"
                                           class="hover:bg-slate-200 cursor-pointer flex items-center rounded-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-slate-700"
                                                 viewBox="0 0 24 24">
                                                <path
                                                    d="m13 3 3.293 3.293-7 7 1.414 1.414 7-7L21 11V3z"></path>
                                                <path
                                                    d="M19 19H5V5h7l-2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2v-5l-2-2v7z"></path>
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="grid grid-cols-3 items-center">
                                <div class="col-span-1 block text-sm font-medium text-gray-700">Post published on</div>
                                <div class="col-span-2 w-full rounded-md bg-white p-3 border-[1px] shadow-sm">
                                    {{ Carbon::parse($post->updated_at)->format('d F Y H:i:s') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="md:col-span-3 col-span-1 flex flex-col space-y-2">
                    <h2 class="text-3xl font-bold text-primary rounded-lg w-fit">
                    Actions
                    </h2>
                    <form
                        action="{{ route('admin.post.update', ['id' => $post->id]) }}"
                        method="post" class="bg-white shadow-lg p-5 rounded-lg">
                        @csrf
                        @method('PATCH')
                        <button type="submit"
                                class="inline-flex items-center gap-1.5 rounded-lg border border-primary bg-primary px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all focus:ring focus:ring-secondary">
                            Unpublish
                        </button>
                    </form>
                </div>
            </div>

            <div class="w-full mt-5">
                <a href="{{ route('admin.post.index') }}"
                   class="mt-10 inline-flex items-center gap-1.5 rounded-lg border border-primary bg-primary px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all focus:ring focus:ring-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-white" viewBox="0 0 24 24">
                        <path
                            d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path>
                    </svg>
                    Back
                </a>
            </div>
        </div>
    </x-dashboard-shell>
</x-app>
