<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-shell>
        {{-- headline section --}}
        <section class="border-b border-black px-5 md:px-10 xl:px-36 py-12 mb-12">
            {{-- headline card --}}
            <div class="flex flex-col gap-3">
                <p class="text-gray-500">Breaking News</p>
                <a href="#" class="text-[96px] leading-none font-bold">Global Climate Summit Reaches Historic Agreement</a>
                <div class="inline-flex gap-6">
                    <p class="font-medium">By Sarah Wang</p>
                    <p class="text-gray-500">December 9, 2025</p>
                    <p class="text-gray-500">3 min read</p>
                </div>
            </div>
        </section>

        {{-- news grid section --}}
        <section class="grid grid-cols-1 lg:grid-cols-3 gap-8 mx-5 md:mx-10 xl:mx-36 pb-8 border-b border-black">
            {{-- left side --}}
            <div class="lg:col-span-2 self-start flex flex-col gap-8">
                <div class="flex flex-col gap-3 p-6 border border-black">
                    <img src="https://placehold.co/1200x800" alt="">
                    <p class="text-gray-500 mt-4">Environment</p>
                    <a href="#" class="text-4xl font-bold">World Leaders Unite on Unprecedented Climate Action Plan</a>
                    <p>In a groundbreaking move, 195 countries have committed to the most ambitious climate targets in history, promising to cut global emissions by 60% within the next decade.</p>

                    <div class="flex justify-between items-center mt-4">
                        <div class="inline-flex gap-2 text-sm">
                            <p class="font-medium">Michael Chen</p>
                            <p class="text-gray-500">2 hours ago</p>
                        </div>
                        <button class="border border-black px-4 py-2 text-sm">Read More</button>
                    </div>
                </div>
                <div class="flex flex-col gap-6">
                    <div class="flex gap-6 border border-black p-6">
                        <img class="h-32 w-auto" src="https://placehold.co/300x200" alt="news picture">
                        <div class="flex flex-col gap-3">
                            <p class="text-gray-500 font-medium">Politics</p>
                            <a href="#" class="text-xl font-bold">Some News about Politics Maybe</a>
                            <p class="inline-flex gap-6 text-sm">
                                <span class="font-medium">by Journalist Name</span>
                                <span class="text-gray-500">December, 23 2025</span>
                                <span class="text-gray-500">3 mins read</span>
                            </p>
                        </div>
                    </div>
                    <div class="flex gap-6 border border-black p-6">
                        <img class="h-32 w-auto" src="https://placehold.co/300x200" alt="news picture">
                        <div class="flex flex-col gap-3">
                            <p class="text-gray-500 font-medium">Politics</p>
                            <a href="#" class="text-xl font-bold">Some News about Politics Maybe</a>
                            <p class="inline-flex gap-6 text-sm">
                                <span class="font-medium">by Journalist Name</span>
                                <span class="text-gray-500">December, 23 2025</span>
                                <span class="text-gray-500">3 mins read</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- right side --}}
            <div class="lg:col-span-1 flex flex-col gap-8 h-full">
                <div class="flex flex-col border border-black p-6">
                    <img class="w-full h-auto" src="https://placehold.co/600x400" alt="Technology news picture">
                    <div>
                        <p class="text-gray-500 text-sm">Technology</p>
                        <a href="#" class="text-lg font-bold">AI Revolution Transforms Healthcare Industry</a>
                        <div class="inline-flex gap-2 text-sm mt-1">
                            <p class="font-medium">Emma Davis</p>
                            <p class="text-gray-500">4 hours ago</p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col border border-black p-6">
                    <img class="w-full h-auto" src="https://placehold.co/600x400" alt="Business news picture">
                    <div>
                        <p class="text-gray-500 text-sm">Business</p>
                        <a href="#" class="text-lg font-bold">Market Volatility Reaches Five-Year High</a>
                        <div class="inline-flex gap-2 text-sm mt-1">
                            <p class="font-medium">Robert Kim</p>
                            <p class="text-gray-500">6 hours ago</p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col border border-black p-6">
                    <img class="w-full h-auto" src="https://placehold.co/600x400" alt="Sports news picture">
                    <div>
                        <p class="text-gray-500 text-sm">Sports</p>
                        <a href="#" class="text-lg font-bold">Championship Finals Break Viewership Records</a>
                        <div class="inline-flex gap-2 text-sm mt-1">
                            <p class="font-medium">Alex Thompson</p>
                            <p class="text-gray-500">8 hours ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- trending section --}}
        <section class="grid grid-cols-1 lg:grid-cols-3 gap-8 mx-5 md:mx-10 xl:mx-36 mt-8">
            <div>
                <h1 class="border-b border-black text-2xl font-bold py-6">Opinion</h1>
                <div class="flex flex-col gap-6 py-6">
                    <div class="flex flex-col gap-2">
                        <a href="#" class="text-lg font-bold leading-none">The Future of Democracy in Digital Age</a>
                        <p class="text-sm">As technology reshapes society, we must examine how democratic institutions adapt to new realities.</p>
                        <p class="inline-flex gap-6 text-xs">
                            <span class="font-medium">Dr. Lisa Park</span>
                            <span class="text-gray-500">December, 23 2025</span>
                            <span class="text-gray-500">6 mins read</span>
                        </p>
                    </div>
                    <div class="flex flex-col gap-3">
                        <a href="#" class="text-lg font-bold leading-none">Economic Inequality: A Growing Concern</a>
                        <p class="text-sm">Recent studies reveal widening gaps that threaten social stability worldwide.</p>
                        <p class="inline-flex gap-6 text-xs">
                            <span class="font-medium">Dr. Lisa Park</span>
                            <span class="text-gray-500">December, 23 2025</span>
                            <span class="text-gray-500">6 mins read</span>
                        </p>
                    </div>

                </div>
            </div>

            <div>
                <h1 class="border-b border-black text-2xl font-bold py-6">Analysis</h1>
                <div class="flex flex-col gap-6 py-6">
                    <div class="flex flex-col gap-2">
                        <a href="#" class="text-lg font-bold leading-none">The Future of Democracy in Digital Age</a>
                        <p class="text-sm">As technology reshapes society, we must examine how democratic institutions adapt to new realities.</p>
                        <p class="inline-flex gap-6 text-xs">
                            <span class="font-medium">Dr. Lisa Park</span>
                            <span class="text-gray-500">December, 23 2025</span>
                            <span class="text-gray-500">6 mins read</span>
                        </p>
                    </div>
                    <div class="flex flex-col gap-3">
                        <a href="#" class="text-lg font-bold leading-none">Economic Inequality: A Growing Concern</a>
                        <p class="text-sm">Recent studies reveal widening gaps that threaten social stability worldwide.</p>
                        <p class="inline-flex gap-6 text-xs">
                            <span class="font-medium">Dr. Lisa Park</span>
                            <span class="text-gray-500">December, 23 2025</span>
                            <span class="text-gray-500">6 mins read</span>
                        </p>
                    </div>

                </div>
            </div>

            <div>
                <h1 class="border-b border-black text-2xl font-bold py-6">Trending</h1>
                <div class="flex flex-col gap-6 py-6">
                    <div class="flex flex-col gap-2">
                        <a href="#" class="text-lg font-bold leading-none">The Future of Democracy in Digital Age</a>
                        <p class="text-sm">As technology reshapes society, we must examine how democratic institutions adapt to new realities.</p>
                        <p class="inline-flex gap-6 text-xs">
                            <span class="font-medium">Dr. Lisa Park</span>
                            <span class="text-gray-500">December, 23 2025</span>
                            <span class="text-gray-500">6 mins read</span>
                        </p>
                    </div>
                    <div class="flex flex-col gap-3">
                        <a href="#" class="text-lg font-bold leading-none">Economic Inequality: A Growing Concern</a>
                        <p class="text-sm">Recent studies reveal widening gaps that threaten social stability worldwide.</p>
                        <p class="inline-flex gap-6 text-xs">
                            <span class="font-medium">Dr. Lisa Park</span>
                            <span class="text-gray-500">December, 23 2025</span>
                            <span class="text-gray-500">6 mins read</span>
                        </p>
                    </div>

                </div>
            </div>

        </section>
    </x-shell>
</x-app>
