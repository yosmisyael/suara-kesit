<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-navbar></x-navbar>
    <main class="md:mt-40 mt-20 mx-5 md:mx-10 xl:mx-60 flex flex-col gap-5">
        <div class="flex items-center gap-3">
            <span class="uppercase font-bold text-lg text-white bg-black p-3">Trending</span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, doloremque incidunt quod saepe
                sapiente suscipit!</p>
        </div>

        <section class="grid grid-cols-8 h-screen md:h-[600px] gap-3">
            <a href="" class="col-span-8 md:col-span-4 row-span-2 relative">
                <div class="w-full h-full bg-auto"
                     style="background-image: url('https://picsum.photos/1920/1080')"></div>
                <div class="text-white absolute bottom-0 p-5 flex flex-col gap-1">
                    <span class="bg-red-700 p-2 w-fit">Category</span>
                    <h1 class="text-2xl font-bold" style="text-shadow: 1px 1px black">Lorem ipsum dolor sit amet,
                        consectetur adipisicing elit. Autem, consequuntur.</h1>
                    <p style="text-shadow: 1px 1px black">Yosev | 12 August 2024</p>
                </div>
            </a>
            <a href="" class="col-span-8 md:col-span-4 row-span-1 relative border-2">
                <div class="h-full bg-auto" style="background-image: url('https://picsum.photos/1920/1080')"></div>
                <div class="text-white absolute bottom-0 p-5 flex flex-col gap-1">
                    <span class="bg-red-700 p-2 w-fit">Category</span>
                    <h1 class="text-lg md:text-2xl font-bold" style="text-shadow: 1px 1px black">Lorem ipsum dolor sit
                        amet, consectetur adipisicing elit. Autem, consequuntur.</h1>
                    <p style="text-shadow: 1px 1px black">Yosev | 12 August 2024</p>
                </div>
            </a>
            <div class="col-span-8 md:col-span-2 row-span-1 relative border-2">
                <div class="h-full bg-auto" style="background-image: url('https://picsum.photos/1920/1080')"></div>

                <div class="text-white absolute bottom-0 p-5 flex flex-col gap-1">
                    <span class="bg-red-700 p-2 w-fit">Category</span>
                    <h1 class="text-xl font-bold" style="text-shadow: 1px 1px black">Lorem ipsum dolor sit amet,
                        consectetur adipisicing elit. Autem, consequuntur.</h1>
                    <p style="text-shadow: 1px 1px black">Yosev | 12 August 2024</p>
                </div>
            </div>
            <div class="col-span-8 md:col-span-2 row-span-1 relative border-2">
                <div class="h-full bg-auto" style="background-image: url('https://picsum.photos/1920/1080')"></div>

                <div class="text-white absolute bottom-0 p-5 flex flex-col gap-1">
                    <span class="bg-red-700 p-2 w-fit">Category</span>
                    <h1 class="text-xl font-bold" style="text-shadow: 1px 1px black">Lorem ipsum dolor sit amet,
                        consectetur adipisicing elit. Autem, consequuntur.</h1>
                    <p style="text-shadow: 1px 1px black">Yosev | 12 August 2024</p>
                </div>
            </div>
        </section>

        <section class="grid grid-cols-3">
            <div class="col-span-2 border-b-2 border-yellow-300 flex w-3/4">
                <span class="bg-yellow-300 uppercase p-3">Jangan Lewatkan</span>
            </div>
            <div class="col-span-1 border-b-2 border-red-500 flex">
                <span class="bg-red-500 uppercase text-white p-3">Billboard</span>
            </div>
            <article class="col-span-1 py-5 flex flex-col gap-3">
                <img src="https://picsum.photos/1920/1080" alt="thumbnail">
                <h1 class="text-xl font-medium">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, perferendis!</h1>
                <p class="text-xs"> <b>Yosev</b> | 20 Aug 2024</p>
                <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et incidunt molestias nesciunt non nulla, perspiciatis velit. Accusamus alias esse iste, laudantium libero odio porro voluptatum.</p>
            </article>
            <div class="col-span-1">
                <article class="p-5 flex gap-3">
                    <img src="https://picsum.photos/1920/1080" alt="thumbnail" class="h-20">
                    <div class="flex flex-col gap-1">
                        <p class="font-semibold text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum eligendi est eveniet modi quibusdam?</p>
                        <p class="text-xs"> <b>Yosev</b> | 20 Aug 2024</p>
                    </div>
                </article>
                <article class="p-5 flex gap-3">
                    <img src="https://picsum.photos/1920/1080" alt="thumbnail" class="h-20">
                    <div class="flex flex-col gap-1">
                        <p class="font-semibold text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum eligendi est eveniet modi quibusdam?</p>
                        <p class="text-xs"> <b>Yosev</b> | 20 Aug 2024</p>
                    </div>
                </article>
                <article class="p-5 flex gap-3">
                    <img src="https://picsum.photos/1920/1080" alt="thumbnail" class="h-20">
                    <div class="flex flex-col gap-1">
                        <p class="font-semibold text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum eligendi est eveniet modi quibusdam?</p>
                        <p class="text-xs"> <b>Yosev</b> | 20 Aug 2024</p>
                    </div>
                </article>
            </div>
            <div class="col-span-1 py-5">
                <img src="https://picsum.photos/1920/1080" alt="billboard picture">
            </div>
        </section>

        <section class="grid grid-cols-3">
            <div class="col-span-2 border-b-2 border-blue-500 flex w-3/4">
                <span class="bg-blue-500 uppercase p-3">Semua Berita</span>
            </div>
            <div class="col-span-1 border-b-2 border-red-500 flex">
                <span class="bg-red-500 uppercase text-white p-3">Ikuti Kami</span>
            </div>
            <div class="col-span-2 py-5 grid grid-cols-2 gap-5">
                <article class="col-span-1 flex flex-col gap-3">
                    <img src="https://picsum.photos/1920/1080" alt="article">
                    <h1 class="text-xl">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, facere.</h1>
                    <p class="text-xs"> <b>Yosev</b> | 20 Aug 2024</p>
                </article>
                <article class="col-span-1 flex flex-col gap-3">
                    <img src="https://picsum.photos/1920/1080" alt="article">
                    <h1 class="text-xl">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, facere.</h1>
                    <p class="text-xs"> <b>Yosev</b> | 20 Aug 2024</p>
                </article>
                <article class="col-span-1 flex flex-col gap-3">
                    <img src="https://picsum.photos/1920/1080" alt="article">
                    <h1 class="text-xl">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, facere.</h1>
                    <p class="text-xs"> <b>Yosev</b> | 20 Aug 2024</p>
                </article>
                <article class="col-span-1 flex flex-col gap-3">
                    <img src="https://picsum.photos/1920/1080" alt="article">
                    <h1 class="text-xl">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, facere.</h1>
                    <p class="text-xs"> <b>Yosev</b> | 20 Aug 2024</p>
                </article>
            </div>
            <div class="col-span-1 p-10 flex flex-col gap-5">
                <a href="" class="flex justify-between items-center font-bold">
                    <div class="flex gap-3">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Instagram_icon.png/800px-Instagram_icon.png" alt="instagram icon" class="h-8">
                        <p>2k+ followers</p>
                    </div>
                    <p class="uppercase bg-black text-white p-2">Follow</p>
                </a>
                <a href="" class="flex justify-between items-center font-bold">
                    <div class="flex gap-3">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/e/ef/Youtube_logo.png" alt="instagram icon" class="h-6">
                        <p>2k+ followers</p>
                    </div>
                    <p class="uppercase bg-black text-white p-2">Subscribe</p>
                </a>
            </div>
            <nav class="col-span-2" aria-label="Page navigation example">
                <ul class="inline-flex -space-x-px text-sm">
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                    </li>
                    <li>
                        <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                    </li>
                </ul>
            </nav>
        </section>
    </main>
    <x-footer></x-footer>
</x-app>
