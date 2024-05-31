<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-dashboard-shell>
        <div x-data="{ showModal: false }">

            <div class="bg-white overflow-hidden shadow rounded-lg border">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        User Profile
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        This is some information about the user.
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
                                Change role status
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <button type="button" x-on:click="showModal = true"
                                        class="rounded-lg border border-blue-500 bg-blue-500 px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-blue-700 hover:bg-blue-700 focus:ring focus:ring-blue-200 disabled:cursor-not-allowed disabled:border-blue-300 disabled:bg-blue-300">
                                    @if($user->roles->first()->name === 'member')
                                        Switch to author
                                    @elseif($user->roles->first()->name === 'author')
                                        Switch to member
                                    @endif
                                </button>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>

            <a href="{{ route('admin.user.index') }}"
               class="mt-5 block w-fit rounded-lg border border-gray-700 bg-gray-700 px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-gray-900 hover:bg-gray-900 focus:ring focus:ring-gray-200 disabled:cursor-not-allowed disabled:border-gray-300 disabled:bg-gray-300">
                <i class="fa-solid fa-arrow-left text-white"></i>
                Back
            </a>
            <template x-if="showModal">
                <div>
                    <div class="fixed z-50 top-0 left-0 right-0 h-screen bg-black opacity-20"></div>
                    <div x-on:keydown.window.escape="showModal = false">

                        <div x-cloak x-transition.opacity
                             class="fixed inset-0 z-10 bg-secondary-700/50"></div>
                        <div x-cloak x-transition
                             class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-0">
                            <div class="mx-auto w-full overflow-hidden rounded-lg bg-white shadow-xl sm:max-w-sm">
                                <div class="relative p-5">
                                    <div class="text-center">
                                        <div
                                            class="mx-auto mb-5 flex h-10 w-10 items-center justify-center rounded-full bg-yellow-100 text-yellow-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 019 9v.375M10.125 2.25A3.375 3.375 0 0113.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 013.375 3.375M9 15l2.25 2.25L15 12"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-medium text-secondary-900">Confirmation</h3>
                                            <div class="mt-2 text-sm text-secondary-500">Do you want to make this user
                                                @if($user->roles->first()->name === 'member')
                                                    author?
                                                @elseif($user->roles->first()->name === 'author')
                                                    member? All post that belongs to this user will be set to private.
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5 flex justify-end gap-3">
                                        <button type="button" x-on:click="showModal = false"
                                                class="flex-1 rounded-lg border border-gray-300 bg-white px-4 py-2 text-center text-sm font-medium text-gray-700 shadow-sm transition-all hover:bg-gray-100 focus:ring focus:ring-gray-100 disabled:cursor-not-allowed disabled:border-gray-100 disabled:bg-gray-50 disabled:text-gray-400">
                                            Cancel
                                        </button>
                                        <form action="{{ route('admin.user.update', ['id' => $user->id]) }}" method="post" class="flex-1">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                            @if($user->roles->first()->name === 'author')
                                                <input type="hidden" name="role" value="member">
                                            @elseif($user->roles->first()->name === 'member')
                                                <input type="hidden" name="role" value="author">
                                            @endif
                                            <button type="submit"
                                                    class="w-full rounded-lg border border-blue-500 bg-blue-500 px-4 py-2 text-center text-sm font-medium text-gray-700 shadow-sm transition-all hover:bg-blue-700 focus:ring focus:ring-gray-100 disabled:cursor-not-allowed disabled:border-gray-100 disabled:bg-gray-50 disabled:text-gray-400 text-white">
                                                Confirm
                                            </button>
                                        </form>
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
