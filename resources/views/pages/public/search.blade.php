<x-layouts.public :title="$title">
    <section class="px-5 md:px-10 xl:px-36 py-12 mb-12">
        {{-- Search Bar --}}
        <form action="" method="get" class="w-full flex">
            <input
                type="text"
                name="keyword"
                class="border-2 border-gray-300 hover:border-black focus:border-black focus:outline-none focus:ring-0 p-3 w-full"
                placeholder="Search news, topics, articles, and more"
            >
            <button class="btn-primary px-3 py-0">
                <span class="material-symbols-outlined mt-2">search</span>
            </button>
        </form>
        <section class="grid grid-cols-3 gap-10 pt-5">
            <div class="col-span-3 md:col-span-2 grid grid-cols-2">
                <div class="col-span-2 w-5/6 border-b-2 border-black inline-flex">
                    <span class="bg-black p-2 md:p-3 uppercase font-semibold text-sm md:text-base text-white">Breaking News</span>
                </div>
                <div class="col-span-2 py-5 grid grid-cols-2 gap-5">
                    <a href="" class="col-span-2 md:col-span-1 flex flex-col gap-1">
                        <img src="https://placehold.co/1920x1080" alt="">
                        <h1 class="font-semibold text-lg md:text-xl">Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Eius, facere.</h1>
                        <p class="text-xs"><b>Yosev</b> | 20 Aug 2024</p>
                    </a>
                    <a href="" class="col-span-2 md:col-span-1 flex flex-col gap-1">
                        <img src="https://placehold.co/1920x1080" alt="article">
                        <h1 class="font-semibold text-lg md:text-xl">Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Eius, facere.</h1>
                        <p class="text-xs"><b>Yosev</b> | 20 Aug 2024</p>
                    </a>
                    <a href="" class="col-span-2 md:col-span-1 flex flex-col gap-1">
                        <img src="https://placehold.co/1920x1080" alt="article">
                        <h1 class="font-semibold text-lg md:text-xl">Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Eius, facere.</h1>
                        <p class="text-xs"><b>Yosev</b> | 20 Aug 2024</p>
                    </a>
                    <a href="" class="col-span-2 md:col-span-1 flex flex-col gap-1">
                        <img src="https://placehold.co/1920x1080" alt="article">
                        <h1 class="font-semibold text-lg md:text-xl">Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Eius, facere.</h1>
                        <p class="text-xs"><b>Yosev</b> | 20 Aug 2024</p>
                    </a>
                </div>
            </div>
            <div class="md:col-span-1 col-span-3 gap-5">
                <div class="w-5/6 border-b-2 border-black h-min inline-flex">
                    <span class="bg-black p-2 md:p-3 uppercase font-semibold text-sm md:text-base text-white">Recommended for You</span>
                </div>
                <div class="flex flex-col">
                    <a href="" class="py-5 md:p-5 flex md:flex-col lg:flex-row gap-3 group">
                        <img src="https://placehold.co/1920x1080" alt="thumbnail" class="h-20">
                        <div class="flex flex-col gap-1 group-hover:eext-black">
                            <p class="font-semibold text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Assumenda, dolorum eligendi est eveniet modi quibusdam?</p>
                            <p class="text-xs"><b>Yosev</b> | 20 Aug 2024</p>
                        </div>
                    </a>
                    <a href="" class="py-5 md:p-5 flex md:flex-col lg:flex-row gap-3 group">
                        <img src="https://placehold.co/1920x1080" alt="thumbnail" class="h-20">
                        <div class="flex flex-col gap-1 group-hover:eext-black">
                            <p class="font-semibold text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Assumenda, dolorum eligendi est eveniet modi quibusdam?</p>
                            <p class="text-xs"><b>Yosev</b> | 20 Aug 2024</p>
                        </div>
                    </a>
                    <a href="" class="py-5 md:p-5 flex md:flex-col lg:flex-row gap-3 group">
                        <img src="https://placehold.co/1920x1080" alt="thumbnail" class="h-20">
                        <div class="flex flex-col gap-1 group-hover:eext-black">
                            <p class="font-semibold text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Assumenda, dolorum eligendi est eveniet modi quibusdam?</p>
                            <p class="text-xs"><b>Yosev</b> | 20 Aug 2024</p>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </section>
</x-layouts.public>
