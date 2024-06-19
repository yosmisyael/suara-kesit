@php use App\Enums\Status; @endphp
<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-dashboard-shell>

        <div>
            <header class="text-black">
                <h2 class="text-2xl font-medium text-gray-600">Welcome to</h2>
                <h1 class="text-5xl font-black md:text-7xl">{{ explode('|', $title)[1] }}</h1>
                <p class="text-lg">List of user applications for author role.</p>
            </header>

            <table class="w-full border-collapse bg-white text-left text-sm text-gray-500 shadow-md rounded-xl">
                <thead class="hover:bg-white/50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">No.</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Username</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Status</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Action</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @if($applications->count() > 0)
                    @foreach($applications as $application)
                        <tr class="hover:bg-gray-50">
                            <th class="px-6 py-4 font-medium text-gray-900">{{ $loop->iteration }}</th>
                            <td class="px-6 py-4">example</td>
                            <td class="px-6 py-4">
                                @switch($application->status)
                                    @case(Status::Pending)
                                        <span
                                            class="inline-flex items-center gap-1 rounded-md bg-yellow-100 px-3 py-1 text-sm font-semibold text-yellow-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-yellow-600"
                                                     viewBox="0 0 24 24"><path
                                                        d="M12 5c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8zm0 14c-3.309 0-6-2.691-6-6s2.691-6 6-6 6 2.691 6 6-2.691 6-6 6z"></path><path
                                                        d="M11 9h2v5h-2zM9 2h6v2H9zm10.293 5.707-2-2 1.414-1.414 2 2z"></path></svg>
                                                Pending
                                            </span>
                                        @break
                                    @case(Status::Rejected)
                                        <span
                                            class="inline-flex items-center gap-1 rounded-md bg-red-100 px-3 py-1 text-sm font-semibold text-red-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-red-600"
                                                 viewBox="0 0 24 24"><path
                                                    d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg>
                                            Rejected
                                        </span>
                                        @break
                                    @case(Status::Approved)
                                        <span
                                            class="inline-flex items-center gap-1 rounded-md bg-green-100 px-3 py-1 text-sm font-semibold text-green-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-green-600"
                                                 viewBox="0 0 24 24"><path
                                                    d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>
                                            Approved
                                        </span>
                                        @break
                                @endswitch
                            </td>
                            <td class="flex justify-start gap-4 px-6 py-4 font-medium">
                                <a href="{{ route('admin.application.edit', ['id' => $application->id]) }}">
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

            @if($applications->count() == 0)
                <p class="text-center mt-5">There is no author application yet.</p>
            @endif
        </div>
    </x-dashboard-shell>
</x-app>
