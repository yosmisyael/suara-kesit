<nav class="fixed top-0 left-0 right-0 pt-3 pb-3 md:pb-0 xl:px-60 px-5 md:px-10 shadow-md flex md:block justify-between bg-white z-10" x-data="{ sidebar: false }">
    <div class="flex justify-between">
        <a href="/" class="flex items-center gap-3">
            <img class="md:h-16 h-10" src="{{ asset('kesit.png') }}" alt="logo">
            <h1 class="font-black md:text-3xl text-2xl uppercase">Suara Kesit</h1>
        </a>
        <img
            src="https://demo.tagdiv.com/newspaper_pro/wp-content/uploads/2019/08/newspaper-rec728.jpg.webp"
            alt="banner" class="lg:h-20 md:h-[60px] hidden md:block">
    </div>
    <div class="justify-between pt-2 hidden md:flex">
        <ul class="flex gap-8 font-semibold">
            <li class="py-3 hover:before:block hover:before:absolute hover:before:w-full before:bottom-0 before:border-b-2 before:border-black relative cursor-pointer">
                NEWS
            </li>
            <li class="py-3 hover:before:block hover:before:absolute hover:before:w-full before:bottom-0 before:border-b-2 before:border-black relative cursor-pointer">
                ABOUT US
            </li>
            <li class="py-3 hover:before:block hover:before:absolute hover:before:w-full before:bottom-0 before:border-b-2 before:border-black relative cursor-pointer">
                CONTACT
            </li>
        </ul>
        <div class="flex gap-3 items-center" x-data="{ isActive: false }">
            <button class="cursor-pointer" @click="isActive = !isActive" x-show="!isActive">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path
                        d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path>
                </svg>
            </button>
            <form x-show="isActive" class="max-w-md mx-auto">
                <div class="flex">
                    <input type="search" class="border-0 focus:border-b-2 focus:border-black focus:ring-0"
                           placeholder="type keyword here" required/>
                    <button type="submit" class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path
                                d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path>
                        </svg>
                    </button>
                    <button @click="isActive = !isActive">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-8">
                            <path
                                d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path>
                        </svg>
                    </button>
                </div>
            </form>
            <a href="" class="text-white bg-black px-2 py-1.5 font-black uppercase rounded-xl flex items-center">Join
                Us</a>
        </div>
    </div>
    <button @click="sidebar = true" class="block md:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-9">
            <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path>
        </svg>
    </button>
    <div x-show="sidebar" :class="sidebar && 'opacity-20'" class="top-0 left-0 transition-all h-screen w-screen bg-black absolute md:hidden"></div>
    <aside class="w-1/2 h-screen bg-white absolute right-[-50%] z-10 top-0 transition-all" :class="sidebar && '-translate-x-full'">
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
            <a href="" class="cursor-pointer bg-black text-white py-2 w-full rounded-lg font-black uppercase rounded-lg text-center">Join Us</a>
        </div>

    </aside>
</nav>
