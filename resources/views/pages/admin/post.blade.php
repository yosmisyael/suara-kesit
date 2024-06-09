@php use Carbon\Carbon; @endphp
<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-dashboard-shell>
        <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-5">
            <header
                class="md:col-span-3 mb-5 flex flex-col gap-1 text-black rounded-lg p-5 bg-gradient-to-l from-indigo-100 to-fuchsia-200 via-stone-100 shadow-lg text-slate-700">
                <h1 class="text-4xl font-medium">{{ explode('|', $title)[1] }}</h1>
            </header>
            <div
                class="md:col-span-2 w-full">
                <h2 class="text-3xl font-medium">Post</h2>
                <article
                    class="shadow-lg rounded-lg p-5 bg-gradient-to-r from-indigo-50 via-gray-50 to-pink-50 p-5 mx-auto">
                    <header class="text-4xl font-semibold text-center">{{ $post->title }}</header>
                    <main>{{ $post->content }}</main>
                </article>
            </div>
            <div class="md:col-span-1 mx-auto">
                <h2 class="text-3xl font-medium">Details</h2>
                <section
                    class="rounded-lg p-5 bg-gradient-to-l from-indigo-100 to-fuchsia-200 via-stone-100 shadow-lg text-slate-700">
                    <h4 class="text-xl font-medium mt-5">User Detail</h4>
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
                    <h4 class="text-xl font-medium mt-5">User Credentials</h4>
                    <div class="space-y-5">
                        <div class="grid grid-cols-3 items-center">
                            <div class="col-span-1 block text-sm font-medium text-gray-700">Post ID</div>
                            <div class="col-span-2 w-full rounded-md bg-white p-3 border-[1px] shadow-sm">
                                {{ $post->id }}
                            </div>
                        </div>
                        <div class="grid grid-cols-3 items-center">
                            <div class="col-span-1 block text-sm font-medium text-gray-700">Published by submission</div>
                            <div class="col-span-2 w-full rounded-md bg-white p-3 border-[1px] shadow-sm">
                                {{ $post->title }}
                            </div>
                        </div>
                        <div class="grid grid-cols-3 items-center">
                            <div class="col-span-1 block text-sm font-medium text-gray-700">Post published on</div>
                            <div class="col-span-2 w-full rounded-md bg-white p-3 border-[1px] shadow-sm">
                                {{ Carbon::parse($post->updated_at)->format('d F Y H:i:s') }}
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="md:col-span-2 col-span-1 bg-gradient-to-l from-indigo-100 to-fuchsia-200 via-stone-100 shadow-lg p-5 rounded-lg flex flex-col gap-5">
                <h2 class="text-3xl font-medium">Actions</h2>
                <form
                    action="{{ route('admin.post.update', ['id' => $post->id]) }}"
                    method="post">
                    @csrf
                    @method('PATCH')
                    <button type="submit"
                            class="rounded-lg border border-slate-600 bg-slate-600 px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-slate-700 hover:bg-slate-700 focus:ring focus:ring-slate-200 disabled:cursor-not-allowed disabled:border-slate-300 disabled:bg-slate-300">
                        Unpublish
                    </button>
                </form>
            </div>
        </div>
    </x-dashboard-shell>
</x-app>
