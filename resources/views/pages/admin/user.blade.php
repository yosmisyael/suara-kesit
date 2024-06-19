<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-dashboard-shell>
        <div class="space-y-3">
            <header class="text-black">
                <h1 class="text-5xl font-black md:text-7xl">{{ explode('|', $title)[1] }}</h1>
            </header>

            <div class="w-fit left-1/2 -translate-x-1/2 absolute z-10">
                @if(session('success'))
                    <div class="flex rounded-md bg-green-100 p-4 text-sm text-green-500" x-cloak x-show="showAlert" x-data="{ showAlert: true }">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mr-3 h-5 w-5 flex-shrink-0">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                        </svg>
                        <div><b>Success Alert.</b> {{ session()->get('success') }} </div>
                        <button class="ml-auto" x-on:click="showAlert = false">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                                <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                            </svg>
                        </button>
                    </div>
                @endif
            </div>

            <div class="bg-white overflow-hidden shadow rounded-lg border">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-xl leading-6 font-medium text-gray-900">
                        User Profile
                    </h3>
                    <p class="mt-1 max-w-2xl text-md text-gray-500">
                        This is detail information about the user.
                    </p>
                </div>
                <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                    <dl class="sm:divide-y sm:divide-gray-200">
                        <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Full name
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $user->name }}
                            </dd>
                        </div>
                        <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Email address
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $user->email }}
                            </dd>
                        </div>
                        <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Role
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $user->roles->first()->name }}
                            </dd>
                        </div>
                        <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Join on
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $user->created_at }}
                            </dd>
                        </div>
                        <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Role
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $user->roles->first()->name }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>

            @if($user->roles->first()->name === 'author')
                <div class="bg-white overflow-hidden shadow rounded-lg border">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-xl leading-6 font-medium text-gray-900">
                            Post Detail
                        </h3>
                        <p class="mt-1 max-w-2xl text-md text-gray-500">
                            This is detail information about all post related to the user.
                        </p>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                        <dl class="sm:divide-y sm:divide-gray-200">
                            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Total post
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $user->posts->count() }}
                                </dd>
                            </div>
                            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Published post
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $user->posts->where('is_published', 1)->count() }}
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            @endif
        </div>
        <a href="{{ $user->roles->first()->name === 'member' ? route('admin.user.member') : route('admin.user.author')  }}"
           class="mt-10 inline-flex items-center gap-1.5 rounded-lg border border-primary bg-primary px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all focus:ring focus:ring-secondary">
            <i class="fa-solid fa-arrow-left text-white"></i>
            Back
        </a>
    </x-dashboard-shell>
</x-app>
