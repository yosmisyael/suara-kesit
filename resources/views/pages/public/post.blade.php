<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-shell>
        <div class="grid grid-cols-3 gap-5 pt-5">
            <div class="col-span-3 md:col-span-2">
                <article class="flex flex-col gap-3">
                    <span class="p-2 uppercase font-bold bg-red-600 text-white w-fit text-sm md:text-base">Category</span>
                    <h1 class="text-2xl md:text-3xl font-extrabold">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Deleniti, optio.</h1>
                    <div class="flex justify-between items-center">
                        <p class="text-sm md:text-base !text-black">By <b>Yosev</b> | 20 aug 2024</p>
                        <ul class="flex gap-3">
                            <li class="inline-flex gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                </svg>
                                12
                            </li>
                            <li class="inline-flex gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z"/>
                                </svg>
                                14
                            </li>
                            <li class="inline-flex gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155"/>
                                </svg>
                                12
                            </li>
                        </ul>
                    </div>
                    <img src="https://picsum.photos/1920/1080" alt="thumbnail" class="w-full">
                    <div>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. At atque cupiditate distinctio ducimus
                        earum est excepturi facere incidunt ipsa ipsum iste itaque maxime minus mollitia nam nihil,
                        nobis nulla quas quasi repellat repellendus unde vero voluptas. Adipisci, architecto aspernatur,
                        blanditiis consectetur cumque cupiditate debitis deserunt dicta dolore doloremque enim
                        exercitationem explicabo non perspiciatis quae repellat reprehenderit unde, ut voluptatibus
                        voluptatum. Adipisci cum enim eveniet facilis nesciunt nobis ut velit veritatis. Accusamus
                        aspernatur dolores ea, earum non quibusdam temporibus unde velit?
                    </div>
                </article>
                <div class="flex gap-3 justify-end mt-10">
                    <button class="bg-red-500 hover:bg-red-700 text-white inline-flex gap-1 p-2 font-bold rounded-lg text-sm md:text-base items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-6 fill-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z"/>
                        </svg>
                        Komentari
                    </button>
                    <button class="bg-red-500 hover:bg-red-700 text-white inline-flex gap-1 p-2 font-bold rounded-lg text-sm md:text-base items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 fill-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                        </svg>
                        Suka
                    </button>
                </div>
                <h2 class="inline-flex border-b-2 border-black w-full mt-5">
                    <span class="font-bold uppercase p-2 bg-black text-white text-sm md:text-base">Komentar</span>
                </h2>
                <div class="flex flex-col gap-3">
                    <div class="flex gap-3 p-5 items-center">
                        <img src="https://picsum.photos/1080/1080" alt="profile" class="h-12 w-12">
                        <div class="flex flex-col">
                            <h3 class="font-bold">Yosev</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolorum ipsum iste modi
                                nihil non, quaerat sequi? Ab amet, animi, aspernatur beatae blanditiis, eaque eius
                                explicabo ipsum minima minus nesciunt quae rerum sequi tenetur voluptas! Dignissimos
                                molestiae nihil quibusdam tenetur.</p>
                            <p class="text-xs italic">12 min ago</p>
                        </div>
                    </div>
                    <p class="text-center">Belum ada komentar</p>
                </div>
            </div>
            <section class="col-span-3 md:col-span-1 h-fit">
                <div class="border-b-2 border-black inline-flex w-full">
                    <span class="bg-black text-white p-2 uppercase font-bold text-sm md:text-base">Berita Baru</span>
                </div>
                <div class="flex flex-col gap-3 p-5 w-full md:w-5/6">
                    <a href=""
                       class="hover:text-red-600 font-bold flex flex-col gap-2 border-b-2 border-black hover:border-red-600 pb-2">Lorem
                        ipsum dolor sit amet, consectetur adipisicing.
                        <span class="text-xs font-normal italic"><b>Yosev</b> | 12 Aug 2024</span>
                    </a>
                    <a href=""
                       class="hover:text-red-600 font-bold flex flex-col gap-2 border-b-2 border-black hover:border-red-600 pb-2">Lorem
                        ipsum dolor sit amet, consectetur adipisicing.
                        <span class="text-xs font-normal italic"><b>Yosev</b> | 12 Aug 2024</span>
                    </a>
                    <a href=""
                       class="hover:text-red-600 font-bold flex flex-col gap-2 border-b-2 border-black hover:border-red-600 pb-2">Lorem
                        ipsum dolor sit amet, consectetur adipisicing.
                        <span class="text-xs font-normal italic"><b>Yosev</b> | 12 Aug 2024</span>
                    </a>
                    <a href=""
                       class="hover:text-red-600 font-bold flex flex-col gap-2 border-b-2 border-black hover:border-red-600 pb-2">Lorem
                        ipsum dolor sit amet, consectetur adipisicing.
                        <span class="text-xs font-normal italic"><b>Yosev</b> | 12 Aug 2024</span>
                    </a>
                </div>
            </section>
        </div>
    </x-shell>
</x-app>
