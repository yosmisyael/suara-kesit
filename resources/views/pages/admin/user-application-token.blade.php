<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-dashboard-shell>
        <div class="">
            <header class="mb-5 flex flex-col gap-1 text-black rounded-lg p-5 bg-gradient-to-l from-indigo-100 to-fuchsia-200 via-stone-100 shadow-lg text-slate-700">
                <h1 class="text-4xl font-medium">{{ explode('|', $title)[1] }}</h1>
            </header>
            <div class="my-4 flex">
                <a href="{{ route('admin.application.token-generate') }}" class="inline-flex items-center gap-1 rounded-lg border border-slate-500 bg-slate-600 px-5 py-2.5 text-center text-md font-medium text-white shadow-sm transition-all hover:border-slate-700 hover:bg-slate-700 focus:ring focus:ring-slate-200">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 fill-white">
                        <path d="M13 7h-2v4H7v2h4v4h2v-4h4v-2h-4z"></path><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path>
                    </svg>
                    Generate Token
                </a>
            </div>
            <table class="w-full border-collapse bg-white text-left text-sm text-gray-500 shadow-md border-[1px]">
                <thead class="bg-gradient-to-l from-indigo-100 to-fuchsia-100 via-stone-100">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">No.</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Token</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Status</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @if($tokens->count() > 0)
                    @foreach($tokens as $token)
                        <tr class="hover:bg-gray-50">
                            <th class="px-6 py-4 font-medium text-gray-900">{{ $loop->iteration }}</th>
                            <td class="px-6 py-4">{{ $token->token }}</td>
                            <td class="px-6 py-4">
                                @if($token->is_active)
                                    <span class="inline-flex items-center gap-1 rounded-md bg-green-100 px-3 py-1 text-sm font-semibold text-green-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-green-600" viewBox="0 0 24 24"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>
                                        Activated
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 rounded-md bg-yellow-100 px-3 py-1 text-sm font-semibold text-yellow-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-yellow-600" viewBox="0 0 24 24"><path d="M12 5c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8zm0 14c-3.309 0-6-2.691-6-6s2.691-6 6-6 6 2.691 6 6-2.691 6-6 6z"></path><path d="M11 9h2v5h-2zM9 2h6v2H9zm10.293 5.707-2-2 1.414-1.414 2 2z"></path></svg>
                                        Non-active
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            @if($tokens->count() == 0)
                <p class="text-center mt-5">There is no token that has been generated yet.</p>
            @endif
        </div>
    </x-dashboard-shell>
</x-app>
