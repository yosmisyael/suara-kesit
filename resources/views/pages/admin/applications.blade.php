@php use App\Enums\AuthorApplicationStatus; @endphp
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
                                    @case(AuthorApplicationStatus::Pending)
                                        <span
                                            class="inline-flex items-center gap-1 rounded-md bg-yellow-100 px-3 py-1 text-sm font-semibold text-yellow-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-yellow-600"
                                                     viewBox="0 0 24 24"><path
                                                        d="M12 5c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8zm0 14c-3.309 0-6-2.691-6-6s2.691-6 6-6 6 2.691 6 6-2.691 6-6 6z"></path><path
                                                        d="M11 9h2v5h-2zM9 2h6v2H9zm10.293 5.707-2-2 1.414-1.414 2 2z"></path></svg>
                                                Pending
                                            </span>
                                        @break
                                    @case(AuthorApplicationStatus::Rejected)
                                        <span
                                            class="inline-flex items-center gap-1 rounded-md bg-red-100 px-3 py-1 text-sm font-semibold text-red-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-red-600"
                                                 viewBox="0 0 24 24"><path
                                                    d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg>
                                            Rejected
                                        </span>
                                        @break
                                    @case(AuthorApplicationStatus::Approved)
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
                                <a href="{{ route('admin.application.edit', ['id' => $application->id]) }}"
                                   class="inline-flex items-center gap-1.5 rounded-lg border border-slate-600 bg-slate-600 px-4 py-2 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-slate-500 hover:bg-slate-700 focus:ring focus:ring-slate-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                         class="fill-white">
                                        <path
                                            d="M2 12h2a7.986 7.986 0 0 1 2.337-5.663 7.91 7.91 0 0 1 2.542-1.71 8.12 8.12 0 0 1 6.13-.041A2.488 2.488 0 0 0 17.5 7C18.886 7 20 5.886 20 4.5S18.886 2 17.5 2c-.689 0-1.312.276-1.763.725-2.431-.973-5.223-.958-7.635.059a9.928 9.928 0 0 0-3.18 2.139 9.92 9.92 0 0 0-2.14 3.179A10.005 10.005 0 0 0 2 12zm17.373 3.122c-.401.952-.977 1.808-1.71 2.541s-1.589 1.309-2.542 1.71a8.12 8.12 0 0 1-6.13.041A2.488 2.488 0 0 0 6.5 17C5.114 17 4 18.114 4 19.5S5.114 22 6.5 22c.689 0 1.312-.276 1.763-.725A9.965 9.965 0 0 0 12 22a9.983 9.983 0 0 0 9.217-6.102A9.992 9.992 0 0 0 22 12h-2a7.993 7.993 0 0 1-.627 3.122z"></path>
                                        <path
                                            d="M12 7.462c-2.502 0-4.538 2.036-4.538 4.538S9.498 16.538 12 16.538s4.538-2.036 4.538-4.538S14.502 7.462 12 7.462zm0 7.076c-1.399 0-2.538-1.139-2.538-2.538S10.601 9.462 12 9.462s2.538 1.139 2.538 2.538-1.139 2.538-2.538 2.538z"></path>
                                    </svg>
                                    Review
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
