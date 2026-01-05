<nav>
    <div class="flex justify-between items-center border-b border-gray-400 py-3 px-5 xl:px-36 md:px-10">
        {{-- brand --}}
        <a href="/" class="inline-flex items-center gap-3">
            <img class="md:h-12 h-10" src="{{ asset('kesit.png') }}" alt="logo">
            <h1 class="font-bold text-2xl">Suara Kesit</h1>
        </a>

        {{-- profile --}}
        <div class="inline-flex items-center gap-4">
            <img src="https://placehold.co/1080x1080" alt="" class="h-10 w-10 rounded-full">
            <h3 class="font-medium">User Name</h3>
        </div>
    </div>
    <div class="border-b border-b-gray-400 px-5 xl:px-36 md:px-10">
        <ul class="flex gap-6 items-center text-lg font-medium text-gray-600">
            <li>
                <a href="{{ route('user.dashboard') }}"
                   class="block py-5 px-5 {{ request()->getUri() === route('user.dashboard') ? 'border-b-[3px] text-black' : '' }}"
                >
                    Profile
                </a>
            </li>
            <li>
                <a href="{{ route('user.settings') }}"
                   class="block py-5 px-5 {{ request()->getUri() === route('user.settings') ? 'border-b-[3px] text-black' : '' }}"
                >
                    Settings
                </a>
            </li>
        </ul>
    </div>
</nav>
