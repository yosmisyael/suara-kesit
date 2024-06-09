<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-dashboard-shell>
        <div x-data="{ showModal: false, postId: null, postTitle: null }">
            <header class="mb-5 flex flex-col gap-1 text-black rounded-lg p-5 bg-gradient-to-l from-indigo-100 to-fuchsia-200 via-stone-100 shadow-lg text-slate-700">
                <h1 class="text-4xl font-medium">{{ explode('|', $title)[1] }}</h1>
            </header>
            <table class="w-full border-collapse bg-white text-left text-sm text-gray-500 shadow-md border-[1px]">
                <thead class="bg-gradient-to-l from-indigo-100 to-fuchsia-100 via-stone-100">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">No.</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Title</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Author</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Status</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Action</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @if($posts->count() > 0)
                    @foreach($posts as $post)
                        <tr class="hover:bg-gray-50">
                            <th class="px-6 py-4 font-medium text-gray-900">{{ $loop->iteration }}</th>
                            <td class="px-6 py-4">{{ $post->title }}</td>
                            <td class="px-6 py-4">{{ $post->user->username }}</td>
                            <td class="px-6 py-4">
                                @if($post->is_published)
                                    <span class="inline-flex items-center gap-1 rounded-md bg-green-100 px-3 py-1 text-sm font-semibold text-green-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-green-600" viewBox="0 0 24 24"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>
                                        Published
                                    </span>
                                @endif
                            </td>
                            <td class="flex justify-start gap-4 px-6 py-4 font-medium">
                                <a href="{{ route('admin.post.edit', ['id' => $post->id]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"/>
                                    </svg>
                                </a>
                                <form id="{{ $post->id }}" action="{{ route('admin.post.delete', ['id' => $post->id]) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="button"
                                            @click="showModal = true; postId = '{{ $post->id }}'; postTitle = '{{ $post->title }}'">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            @if($posts->count() == 0)
                <p class="text-center mt-5">There is no post that has been published yet.</p>
            @endif
            <template x-if="showModal">
                <div>
                    <div class="fixed z-50 top-0 left-0 right-0 h-screen bg-black opacity-20"></div>
                    <div x-on:keydown.window.escape="showModal = false">
                        <div x-cloak x-transition
                             class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-0">
                            <div class="mx-auto w-full overflow-hidden rounded-lg bg-white shadow-xl sm:max-w-sm">
                                <div class="relative p-5">
                                    <div class="text-center">
                                        <div
                                            class="mx-auto mb-5 flex h-10 w-10 items-center justify-center rounded-full bg-red-100 text-red-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-medium text-secondary-900">Confirm Account
                                                Deletion</h3>
                                            <div class="mt-2 text-sm text-secondary-500">
                                                Are you sure you want to <b class="text-red-600">delete</b> this post?
                                                <p class="text-lg font-medium">"<span x-text="postTitle"></span>"</p>
                                                This action <b class="text-red-600">cannot be undone. </b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5 flex justify-end gap-3">
                                        <button type="button" x-on:click="showModal = false"
                                                class="flex-1 rounded-lg border border-gray-300 bg-white px-4 py-2 text-center text-sm font-medium text-gray-700 shadow-sm transition-all hover:bg-gray-100 focus:ring focus:ring-gray-100 disabled:cursor-not-allowed disabled:border-gray-100 disabled:bg-gray-50 disabled:text-gray-400">
                                            Cancel
                                        </button>
                                        <button @click="document.getElementById(postId).submit()" type="button"
                                                class="flex-1 rounded-lg border border-red-500 bg-red-500 px-4 py-2 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-red-700 hover:bg-red-700 focus:ring focus:ring-red-200 disabled:cursor-not-allowed disabled:border-red-300 disabled:bg-red-300">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </x-dashboard-shell>
</x-app>
