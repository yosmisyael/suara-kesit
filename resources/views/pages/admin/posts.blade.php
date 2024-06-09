<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-dashboard-shell>
        <x-app>
            <x-slot:title>{{ $title }}</x-slot:title>
            <x-dashboard-shell>
                <div class="">
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
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    @if($posts->count() == 0)
                        <p class="text-center mt-5">There is no post that has been published yet.</p>
                    @endif
                </div>
            </x-dashboard-shell>
        </x-app>

    </x-dashboard-shell>
</x-app>
