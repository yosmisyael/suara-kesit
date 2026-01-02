<nav class="fixed top-0 left-0 right-0 py-3 xl:px-36 px-5 md:px-10 border-b border-black flex md:block justify-between bg-white z-10" x-data="{ sidebar: false }">
    <div class="flex justify-between">
        {{-- brand --}}
        <a href="/" class="flex items-center gap-3">
            <img class="md:h-12 h-10" src="{{ asset('kesit.png') }}" alt="logo">
            <h1 class="font-bold text-2xl">Suara Kesit</h1>
        </a>

        {{-- navlinks --}}
        <ul class="flex gap-8 font-semibold items-center">
            <li class="py-3 hover:before:block hover:before:absolute hover:before:w-full before:bottom-0 before:border-b-2 before:border-black relative cursor-pointer {{ request()->getUri() === route('public.news') ? 'before:block before:absolute before:w-full' : ''}}">
                <a href="{{ route('public.news') }}">Politics</a>
            </li>
            <li class="py-3 hover:before:block hover:before:absolute hover:before:w-full before:bottom-0 before:border-b-2 before:border-black relative cursor-pointer {{ request()->getUri() === route('public.about') ? 'before:block before:absolute before:w-full' : ''}}" >
                <a href="{{ route('public.news') }}">Bussiness</a>
            </li>
            <li class="py-3 hover:before:block hover:before:absolute hover:before:w-full before:bottom-0 before:border-b-2 before:border-black relative cursor-pointer {{ request()->getUri() === route('public.contact') ? 'before:block before:absolute before:w-full' : ''}}">
                <a href="{{ route('public.news') }}">Technology</a>
            </li>
            <li class="py-3 hover:before:block hover:before:absolute hover:before:w-full before:bottom-0 before:border-b-2 before:border-black relative cursor-pointer {{ request()->getUri() === route('public.contact') ? 'before:block before:absolute before:w-full' : ''}}">
                <a href="{{ route('public.news') }}">Culture</a>
            </li>
            <li class="py-3 hover:before:block hover:before:absolute hover:before:w-full before:bottom-0 before:border-b-2 before:border-black relative cursor-pointer {{ request()->getUri() === route('public.contact') ? 'before:block before:absolute before:w-full' : ''}}">
                <a href="{{ route('public.news') }}">Sports</a>
            </li>
        </ul>
        {{-- cta --}}
        <div class="flex gap-3 items-center">
            <a href="{{ route('public.news') }}" class="btn-secondary">Search</a>
            <a href="#" class="btn-primary">Subscribe</a>
        </div>
    </div>
    <button @click="sidebar = true" class="block md:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-9">
            <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path>
        </svg>
    </button>
</nav>
