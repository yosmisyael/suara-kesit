<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-dashboard-shell>
        <div class="grid grid-cols-4 gap-10">
            <div
                class="col-span-4 xl:col-span-2 flex flex-col rounded-lg justify-center"
            >
                <h2 class="text-2xl font-medium text-gray-600">Hallo, welcome back</h2>
                <h1 class="text-5xl font-black md:text-7xl">Administrator Dashboard</h1>
                <p class="text-lg">Manage every aspect of your platform. Track website traffic, analyze user behavior, manage user roles, and configure advanced settings - all from a centralized and user-friendly interface.</p>
            </div>

            <div class="col-span-4 xl:col-span-2 grid grid-cols-2 gap-5 mb-4 w-full text-white">
                <div
                    class="col-span-2 xl:col-span-1 shadow-xl p-5 rounded-lg flex justify-between bg-contrary"
                >
                    <div>
                        <h4 class="text-2xl font-semibold">Users</h4>
                        <h4 class="text-5xl font-semibold">120</h4>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFF"
                         class="h-20 w-20 fill-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/>
                    </svg>
                </div>
                <div
                    class="col-span-2 xl:col-span-1 shadow-xl p-5 rounded-lg flex justify-between gap-[8rem] bg-complementary"
                >
                    <div>
                        <h4 class="text-2xl font-semibold">Member</h4>
                        <h4 class="text-5xl font-semibold">120</h4>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-20 w-20 fill-white">
                        <path
                            d="M12 2C6.579 2 2 6.579 2 12s4.579 10 10 10 10-4.579 10-10S17.421 2 12 2zm0 5c1.727 0 3 1.272 3 3s-1.273 3-3 3c-1.726 0-3-1.272-3-3s1.274-3 3-3zm-5.106 9.772c.897-1.32 2.393-2.2 4.106-2.2h2c1.714 0 3.209.88 4.106 2.2C15.828 18.14 14.015 19 12 19s-3.828-.86-5.106-2.228z"></path>
                    </svg>
                </div>
                <div
                    class="col-span-2 xl:col-span-1 shadow-xl p-5 rounded-lg flex justify-between gap-[8rem] bg-primary"
                >
                    <div>
                        <h4 class="text-2xl font-semibold">Author</h4>
                        <h4 class="text-5xl font-semibold">120</h4>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-20 w-20 fill-white">
                        <path
                            d="M8 12.052c1.995 0 3.5-1.505 3.5-3.5s-1.505-3.5-3.5-3.5-3.5 1.505-3.5 3.5 1.505 3.5 3.5 3.5zM9 13H7c-2.757 0-5 2.243-5 5v1h12v-1c0-2.757-2.243-5-5-5zm11.294-4.708-4.3 4.292-1.292-1.292-1.414 1.414 2.706 2.704 5.712-5.702z"></path>
                    </svg>
                </div>
                <div
                    class="col-span-2 xl:col-span-1 shadow-xl p-5 rounded-lg flex justify-between gap-[8rem] bg-secondary"
                >
                    <div>
                        <h4 class="text-2xl font-semibold">Posts</h4>
                        <h4 class="text-5xl font-semibold">120</h4>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" stroke-width="1.5" stroke="#FFF"
                         class="h-20 w-20 fill-white">
                        <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M96 96c0-35.3 28.7-64 64-64H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H80c-44.2 0-80-35.8-80-80V128c0-17.7 14.3-32 32-32s32 14.3 32 32V400c0 8.8 7.2 16 16 16s16-7.2 16-16V96zm64 24v80c0 13.3 10.7 24 24 24H296c13.3 0 24-10.7 24-24V120c0-13.3-10.7-24-24-24H184c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zM160 304c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16z"/>
                    </svg>
                </div>
            </div>

            <div class="col-span-4 grid grid-cols-4 gap-10 rounded-lg mb-4">
                <div class="col-span-4 lg:col-span-2 bg-white rounded-lg p-5 shadow-lg h-fit text-complementary fill-complementary">
                    <h4 class="text-2xl font-semibold flex gap-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                             class="h-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"/>
                        </svg>
                        Monthly Visitors
                    </h4>
                    <div
                        x-data="{
                            options: {
                                chart: {
                                    type: 'line'
                                },
                                series: [{
                                    name: 'Visitor',
                                    data: [30,40,35,50,49,60,70,91,125]
                                }],
                                xaxis: {
                                    categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
                                },
                                colors:['#636D79']

                            }
                        }"
                        x-init="new $store.ApexCharts.constructor($el, options).render()"
                    ></div>
                </div>

                <div class="col-span-4 lg:col-span-2 h-fit flex flex-col gap-10">
                    <div class="bg-white shadow-xl p-5 rounded-xl flex flex-col gap-5 text-black">
                        <h4 class="text-2xl font-semibold flex gap-2 items-center text-complementary">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="h-7 fill-complementary">
                                <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M272 384c9.6-31.9 29.5-59.1 49.2-86.2l0 0c5.2-7.1 10.4-14.2 15.4-21.4c19.8-28.5 31.4-63 31.4-100.3C368 78.8 289.2 0 192 0S16 78.8 16 176c0 37.3 11.6 71.9 31.4 100.3c5 7.2 10.2 14.3 15.4 21.4l0 0c19.8 27.1 39.7 54.4 49.2 86.2H272zM192 512c44.2 0 80-35.8 80-80V416H112v16c0 44.2 35.8 80 80 80zM112 176c0 8.8-7.2 16-16 16s-16-7.2-16-16c0-61.9 50.1-112 112-112c8.8 0 16 7.2 16 16s-7.2 16-16 16c-44.2 0-80 35.8-80 80z"/>
                            </svg>
                            Insights
                        </h4>
                        <div class="text-2xl font-semibold flex gap-2 items-center bg-base p-2 rounded-lg">
                            <span class="h-16 w-16 flex items-center justify-center p-3 bg-white rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-7 fill-complementary"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path
                                        d="M64 64c0-17.7-14.3-32-32-32S0 46.3 0 64V400c0 44.2 35.8 80 80 80H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H80c-8.8 0-16-7.2-16-16V64zm406.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L320 210.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0l-112 112c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L240 221.3l57.4 57.4c12.5 12.5 32.8 12.5 45.3 0l128-128z"/></svg>
                            </span>
                            <div class="flex flex-col">
                                <h4 class="text-xl font-semibold">Average Daily Visitor</h4>
                                <h4 class="text-2xl font-bold text-complementary">30</h4>
                            </div>
                        </div>
                        <div class="text-2xl font-semibold flex gap-2 items-center bg-base p-2 rounded-lg">
                            <span class="h-16 w-16 flex items-center justify-center p-3 bg-white rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-7 fill-complementary"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path
                                        d="M64 64c0-17.7-14.3-32-32-32S0 46.3 0 64V400c0 44.2 35.8 80 80 80H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H80c-8.8 0-16-7.2-16-16V64zm406.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L320 210.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0l-112 112c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L240 221.3l57.4 57.4c12.5 12.5 32.8 12.5 45.3 0l128-128z"/></svg>
                            </span>
                            <div class="flex flex-col">
                                <h4 class="text-xl font-semibold">Visitor Peak</h4>
                                <h4 class="text-2xl font-bold text-complementary">30</h4>
                            </div>
                        </div>
                        <div class="text-2xl font-semibold flex gap-2 items-center bg-base p-2 rounded-lg">
                            <span class="h-16 w-16 flex items-center justify-center p-3 bg-white rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-7 fill-contrary"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path
                                        d="M64 64c0-17.7-14.3-32-32-32S0 46.3 0 64V400c0 44.2 35.8 80 80 80H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H80c-8.8 0-16-7.2-16-16V64zm406.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L320 210.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0l-112 112c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L240 221.3l57.4 57.4c12.5 12.5 32.8 12.5 45.3 0l128-128z"/></svg>
                            </span>
                            <div class="flex flex-col">
                                <h4 class="text-xl font-semibold">New Signups June</h4>
                                <h4 class="text-2xl font-bold text-complementary">30</h4>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white shadow-xl p-5 rounded-lg flex flex-col gap-5">
                        <h4 class="text-2xl font-semibold flex gap-2 items-center text-complementary fill-complementary">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="h-7">
                                <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M384 160c-17.7 0-32-14.3-32-32s14.3-32 32-32H544c17.7 0 32 14.3 32 32V288c0 17.7-14.3 32-32 32s-32-14.3-32-32V205.3L342.6 374.6c-12.5 12.5-32.8 12.5-45.3 0L192 269.3 54.6 406.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160c12.5-12.5 32.8-12.5 45.3 0L320 306.7 466.7 160H384z"/>
                            </svg>
                            Trends
                        </h4>
                        <div class="text-2xl font-semibold flex gap-2 items-center bg-base p-2 rounded-lg">
                            <span class="h-16 w-16 flex items-center justify-center p-3 bg-white rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-7 fill-contrary"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path
                                        d="M64 64c0-17.7-14.3-32-32-32S0 46.3 0 64V400c0 44.2 35.8 80 80 80H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H80c-8.8 0-16-7.2-16-16V64zm406.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L320 210.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0l-112 112c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L240 221.3l57.4 57.4c12.5 12.5 32.8 12.5 45.3 0l128-128z"/></svg>
                            </span>
                            <div class="flex flex-col">
                                <h4 class="text-xl font-semibold">Popular Keywords</h4>
                                <h4 class="text-2xl font-bold text-complementary">Machine Learning</h4>
                            </div>
                        </div>
                        <div class="text-2xl font-semibold flex gap-2 items-center bg-base p-2 rounded-lg">
                            <span class="h-16 w-16 flex items-center justify-center p-3 bg-white rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-7 fill-contrary"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path
                                        d="M64 64c0-17.7-14.3-32-32-32S0 46.3 0 64V400c0 44.2 35.8 80 80 80H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H80c-8.8 0-16-7.2-16-16V64zm406.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L320 210.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0l-112 112c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L240 221.3l57.4 57.4c12.5 12.5 32.8 12.5 45.3 0l128-128z"/></svg>
                            </span>
                            <div class="flex flex-col">
                                <h4 class="text-xl font-semibold">New Posts June</h4>
                                <h4 class="text-2xl font-bold text-complementary">13</h4>
                            </div>
                        </div>
                        <div class="text-2xl font-semibold flex gap-2 items-center bg-base p-2 rounded-lg">
                            <span class="h-16 w-16 flex items-center justify-center p-3 bg-white rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-7 fill-contrary"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path
                                        d="M64 64c0-17.7-14.3-32-32-32S0 46.3 0 64V400c0 44.2 35.8 80 80 80H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H80c-8.8 0-16-7.2-16-16V64zm406.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L320 210.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0l-112 112c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L240 221.3l57.4 57.4c12.5 12.5 32.8 12.5 45.3 0l128-128z"/></svg>
                            </span>
                            <div class="flex flex-col">
                                <h4 class="text-xl font-semibold">Most Visited Article</h4>
                                <h4 class="text-2xl font-bold text-complementary flex gap-3">
                                    <span class="block">How to train a ...</span>
                                    <a href=""
                                       class="cursor-pointer flex items-center rounded-sm w-7 h-7 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-contrary"
                                             viewBox="0 0 24 24">
                                            <path
                                                d="m13 3 3.293 3.293-7 7 1.414 1.414 7-7L21 11V3z"></path>
                                            <path
                                                d="M19 19H5V5h7l-2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2v-5l-2-2v7z"></path>
                                        </svg>
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-dashboard-shell>
</x-app>
