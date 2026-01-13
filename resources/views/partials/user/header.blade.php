<nav>
    <div class="flex justify-between items-center border-b border-gray-400 py-3 px-5 xl:px-36 md:px-10">
        {{-- brand --}}
        <a href="/" class="inline-flex items-center gap-3">
            <img class="md:h-12 h-10" src="{{ asset('kesit.png') }}" alt="logo">
            <h1 class="font-bold text-2xl">Suara Kesit</h1>
        </a>

        {{-- profile --}}
        <div class="inline-flex items-center gap-4">
            <img src="https://ui-avatars.com/api/?name={{ $user->name }}" alt="" class="h-10 w-10 rounded-full">
            <h3 class="font-medium">{{ $user->name }}</h3>
        </div>
    </div>
    <div class="border-b border-b-gray-400 px-5 xl:px-36 md:px-10">
        <ul class="flex gap-6 items-center text-lg font-semibold text-gray-600">
            @role('member')
                <x-user-nav-link route="user.dashboard">
                    Profile
                </x-user-nav-link>
                @role('writer')
                    <x-user-nav-link route="user.post">
                        Posts
                    </x-user-nav-link>
                @endrole
                <x-user-nav-link route="user.settings">
                    Settings
                </x-user-nav-link>
            @endrole

            <li class="ml-auto">
                <form action="{{ route('user.logout') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex gap-3 items-center py-5 px-5 text-red-500 cursor-pointer">
                        <span class="material-symbols-outlined">logout</span>
                        Logout
                    </button>
                </form>
            </li>

        </ul>
    </div>
</nav>
