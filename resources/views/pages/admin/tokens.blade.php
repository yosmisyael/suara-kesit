<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-dashboard-shell>
        <div class="">
            <header class="text-black">
                <h2 class="text-2xl font-medium text-gray-600">Welcome to</h2>
                <h1 class="text-5xl font-black md:text-7xl">{{ explode('|', $title)[1] }}</h1>
                <p class="text-lg">List of author token.</p>
            </header>
            <div class="my-4 flex">
                <a href="{{ route('admin.token.store') }}"
                   class="inline-flex items-center gap-1.5 rounded-lg border border-primary bg-primary px-4 py-2 text-center text-sm font-medium text-white shadow-sm transition-all focus:ring focus:ring-complementary">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 fill-white">
                        <path d="M13 7h-2v4H7v2h4v4h2v-4h4v-2h-4z"></path>
                        <path
                            d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path>
                    </svg>
                    Generate Token
                </a>
            </div>

            <table class="w-full border-collapse bg-white text-left text-sm text-gray-500 shadow-md rounded-xl">
                <thead class="hover:bg-white/50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">No.</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Token</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Status</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Activated by</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Activation Date</th>
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
                                    <span
                                        class="inline-flex items-center gap-1 rounded-md bg-green-100 px-3 py-1 text-sm font-semibold text-green-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-green-600"
                                             viewBox="0 0 24 24"><path
                                                d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>
                                        Activated
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center gap-1 rounded-md bg-yellow-100 px-3 py-1 text-sm font-semibold text-yellow-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-yellow-600"
                                             viewBox="0 0 24 24"><path
                                                d="M12 5c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8zm0 14c-3.309 0-6-2.691-6-6s2.691-6 6-6 6 2.691 6 6-2.691 6-6 6z"></path><path
                                                d="M11 9h2v5h-2zM9 2h6v2H9zm10.293 5.707-2-2 1.414-1.414 2 2z"></path></svg>
                                        Non-active
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">{{ $token->application ? $token->application->user->username : 'No data' }}</td>
                            <td class="px-6 py-4">{{ $token->application ? Carbon\Carbon::parse($token->updated_at)->format('d F Y H:i:s') : 'No data' }}</td>
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
