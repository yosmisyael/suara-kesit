@php use App\Enums\Status; @endphp
<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-dashboard-shell>

        <div>
            <header
                class="mb-5 flex flex-col gap-1 text-black rounded-lg p-5 bg-gradient-to-l from-indigo-100 to-fuchsia-200 via-stone-100 shadow-lg text-slate-700">
                <h1 class="text-4xl font-medium">{{ explode('|', $title)[1] }}</h1>
            </header>
            <table class="w-full border-collapse bg-white text-left text-sm text-gray-500 shadow-md border-[1px] mt-5">
                <thead class="bg-gradient-to-l from-indigo-100 to-fuchsia-100 via-stone-100">
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
                                <a href="{{ route('admin.submission.edit', ['id' => $submission->id]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"/>
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
