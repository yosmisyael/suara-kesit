<nav class="fixed top-0 left-0 right-0 py-3 pb-3 xl:px-36 px-5 md:px-10 border-b border-black flex md:block justify-between bg-white z-10" x-data="{ sidebar: false }">
    <div class="flex justify-between">
        {{-- brand --}}
        <a href="/" class="flex items-center gap-3">
            <img class="md:h-12 h-10" src="{{ asset('kesit.png') }}" alt="logo">
            <h1 class="font-bold text-2xl">Suara Kesit</h1>
        </a>

        {{-- navlinks --}}
        <ul class="flex gap-8 font-semibold items-center">
            <li class="py-3 hover:before:block hover:before:absolute hover:before:w-full before:bottom-0 before:border-b-2 before:border-black relative cursor-pointer {{ request()->getUri() === route('public.posts') ? 'before:block before:absolute before:w-full' : ''}}">
                <a href="{{ route('public.posts') }}">Politics</a>
            </li>
            <li class="py-3 hover:before:block hover:before:absolute hover:before:w-full before:bottom-0 before:border-b-2 before:border-black relative cursor-pointer {{ request()->getUri() === route('public.about') ? 'before:block before:absolute before:w-full' : ''}}" >
                <a href="{{ route('public.about') }}">Bussiness</a>
            </li>
            <li class="py-3 hover:before:block hover:before:absolute hover:before:w-full before:bottom-0 before:border-b-2 before:border-black relative cursor-pointer {{ request()->getUri() === route('public.contact') ? 'before:block before:absolute before:w-full' : ''}}">
                <a href="{{ route('public.contact') }}">Technology</a>
            </li>
            <li class="py-3 hover:before:block hover:before:absolute hover:before:w-full before:bottom-0 before:border-b-2 before:border-black relative cursor-pointer {{ request()->getUri() === route('public.contact') ? 'before:block before:absolute before:w-full' : ''}}">
                <a href="{{ route('public.contact') }}">Culture</a>
            </li>
            <li class="py-3 hover:before:block hover:before:absolute hover:before:w-full before:bottom-0 before:border-b-2 before:border-black relative cursor-pointer {{ request()->getUri() === route('public.contact') ? 'before:block before:absolute before:w-full' : ''}}">
                <a href="{{ route('public.contact') }}">Sports</a>
            </li>
        </ul>
        {{-- cta --}}
        <div class="flex gap-3 items-center">
            <a href="#" class="btn-secondary">Search</a>
            <a href="{{ route('user.auth.login') }}" class="btn-primary">Subscribe</a>
        </div>
    </div>
    <button @click="sidebar = true" class="block md:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-9">
            <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path>
        </svg>
    </button>
    <div x-show="sidebar" :class="sidebar && 'opacity-20'" class="top-0 left-0 transition-all h-screen w-screen bg-black absolute md:hidden"></div>
    <aside class="w-3/4 h-screen bg-white absolute right-[-75%] z-10 top-0 transition-all" :class="sidebar && '-translate-x-full'">
        <button class="absolute right-2.5 top-2.5" @click="sidebar = false">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-10 cursor-pointer">
                <path
                    d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path>
            </svg>
        </button>
        <div class="flex flex-col pt-20 px-5 gap-5">
            <a href="" class="text-xl uppercase font-bold hover:before:block hover:before:absolute hover:before:w-full before:bottom-0 before:border-b-2 before:border-black relative">News</a>
            <a href="" class="text-xl uppercase font-bold hover:before:block hover:before:absolute hover:before:w-full before:bottom-0 before:border-b-2 before:border-black relative">About Us</a>
            <a href="" class="text-xl uppercase font-bold hover:before:block hover:before:absolute hover:before:w-full before:bottom-0 before:border-b-2 before:border-black relative">Contact</a>
            <a href="{{ route('user.auth.login') }}" class="cursor-pointer bg-black text-white py-2 w-full rounded-lg font-black uppercase rounded-lg text-center">Join Us</a>
        </div>

    </aside>
</nav>
