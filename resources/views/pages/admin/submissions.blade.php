<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-dashboard-shell>

        <div class="relative">
            <header class="text-black">
                <h2 class="text-2xl font-medium text-gray-600">Welcome to</h2>
                <h1 class="text-5xl font-black md:text-7xl">{{ explode('|', $title)[1] }}</h1>
                <p class="text-lg">List of all published post.</p>
            </header>

            @if(session('success'))
                <div class="w-max left-1/2 -translate-x-1/2 absolute top-0 z-10">
                    <div class="flex rounded-md bg-green-100 p-4 text-sm text-green-500" x-cloak x-show="showAlert"
                         x-data="{ showAlert: true }">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                             class="mr-3 h-5 w-5 flex-shrink-0">
                            <path fill-rule="evenodd"
                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                  clip-rule="evenodd"/>
                        </svg>
                        <div><b>Success Alert.</b> {{ session()->get('success') }}</div>
                        <button class="ml-auto" x-on:click="showAlert = false">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                 class="h-5 w-5">
                                <path
                                    d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            <table class="w-full border-collapse bg-white text-left text-sm text-gray-500 shadow-md rounded-xl">
                <thead class="hover:bg-white/50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">No.</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Post</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Submitted by</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Action</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @if($submissions->count() > 0)
                    @foreach($submissions as $submission)
                        <tr class="hover:bg-gray-50">
                            <th class="px-6 py-4 font-medium text-gray-900">{{ $loop->iteration }}</th>
                            <td class="px-6 py-4">{{ $submission->post->title }}</td>
                            <td class="px-6 py-4">{{ $submission->post->user->username }}</td>
                            <td class="flex justify-start gap-4 px-6 py-4 font-medium">
                                <a href="{{ route('admin.review.create', ['id' => $submission->id]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor"
                                         class="h-7 w-7 hover:fill-complementary stroke-primary fill-none">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            @if($submissions->count() == 0)
                <p class="text-center mt-5">There is no author application yet.</p>
            @endif
        </div>
    </x-dashboard-shell>
</x-app>
