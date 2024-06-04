<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-dashboard-shell>
        <h1 class="text-5xl font-medium my-2">Stats</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
            <div
                class="shadow-lg rounded-lg bg-white h-32 md:h-32 flex p-4 items-center bg-gradient-to-r from-indigo-400 to-blue-700 text-white"
            >
                <div class="flex-auto text-2xl font-semibold">
                    All Active Users
                </div>
                <h1 class="flex-1 text-4xl font-bold">{{ $users->count() }}</h1>
            </div>
            <div
                class="shadow-lg rounded-lg bg-white h-32 md:h-32 flex p-4 items-center bg-gradient-to-r from-indigo-400 to-blue-700 text-white"
            >
                <div class="flex-auto text-2xl font-semibold">
                    Member Total
                </div>
                <h1 class="flex-1 text-4xl font-bold">{{ $members->count() }}</h1>
            </div>
            <div
                class="shadow-lg rounded-lg bg-white h-32 md:h-32 flex p-4 items-center bg-gradient-to-r from-indigo-400 to-blue-700 text-white"
            >
                <div class="flex-auto text-2xl font-semibold">
                    Author Total
                </div>
                <h1 class="flex-1 text-4xl font-bold">{{ $authors->count() }}</h1>
            </div>
            <div
                class="shadow-lg rounded-lg bg-white h-32 md:h-32 flex p-4 items-center bg-gradient-to-r from-indigo-400 to-blue-700 text-white"
            >
                <div class="flex-auto text-2xl font-semibold">
                    Author Request
                </div>
                <h1 class="flex-1 text-4xl font-bold">1000</h1>
            </div>
        </div>
        <h1 class="text-5xl font-medium my-2">Features</h1>
        <div class="grid grid-cols-4 gap-4 mb-4">
            <a href="{{ route('admin.user.create') }}"
                class="shadow-lg rounded-lg col-span-4 md:col-span-2 lg:col-span-1 h-60 p-4 flex gap-4 items-center justify-center cursor-pointer bg-gradient-to-r from-red-500 to-orange-400 text-white hover:shadow-xl hover:scale-[1.01] transition-all relative"
            >
                <div class="flex flex-col items-center gap-3">
                    <i class="fa-solid fa-address-book text-7xl"></i>
                    <div class="text-center">
                        <h1 class="font-bold">Registration</h1>
                        <p class="text-sm font-medium">Streamline user onboarding with effortless registration management.</p>
                    </div>
                </div>

                <div class="absolute bottom-5 right-5">
                    <i class="fa-solid fa-circle-chevron-right text-4xl"></i>
                </div>
            </a>
            <a href="{{ route('admin.user.member') }}"
               class="shadow-lg rounded-lg col-span-4 md:col-span-2 lg:col-span-1 h-60 p-4 flex gap-4 items-center justify-center cursor-pointer bg-gradient-to-r from-red-500 to-orange-400 text-white hover:shadow-xl hover:scale-[1.01] transition-all relative"
            >
                <div class="flex flex-col items-center gap-3">
                    <i class="fa-solid fa-users-gear text-7xl"></i>
                    <div class="text-center">
                        <h1 class="font-bold">Member Management</h1>
                        <p class="text-sm font-medium">Simplify member oversight with centralized account control.</p>
                    </div>
                </div>

                <div class="absolute bottom-5 right-5">
                    <i class="fa-solid fa-circle-chevron-right text-4xl"></i>
                </div>
            </a>
            <a href="{{ route('admin.user.author') }}"
               class="shadow-lg rounded-lg col-span-4 md:col-span-2 lg:col-span-1 h-60 p-4 flex gap-4 justify-center items-center cursor-pointer bg-gradient-to-r from-red-500 to-orange-400 text-white hover:shadow-xl hover:scale-[1.01] transition-all relative"
            >
                <div class="flex flex-col items-center gap-3">
                    <i class="fa-solid fa-feather text-7xl"></i>
                    <div class="text-center">
                        <h1 class="font-bold">Author Management</h1>
                        <p class="text-sm font-medium">Manage author accounts and content with ease.</p>
                    </div>
                </div>

                <div class="absolute bottom-5 right-5">
                    <i class="fa-solid fa-circle-chevron-right text-4xl"></i>
                </div>
            </a>
            <a href="{{ route('admin.application.index') }}"
               class="shadow-lg rounded-lg col-span-4 md:col-span-2 lg:col-span-1 h-60 p-4 flex gap-4 justify-center items-center cursor-pointer bg-gradient-to-r from-red-500 to-orange-400 text-white hover:shadow-xl hover:scale-[1.01] transition-all relative"
            >
                <div class="flex flex-col items-center gap-3">
                    <i class="fa-solid fa-user-check text-7xl"></i>
                    <div class="text-center">
                        <h1 class="font-bold">Author Application</h1>
                        <p class="text-sm font-medium">Effortlessly onboard new authors through streamlined requests.</p>
                    </div>
                </div>

                <div class="absolute bottom-5 right-5">
                    <i class="fa-solid fa-circle-chevron-right text-4xl"></i>
                </div>
            </a>
        </div>
    </x-dashboard-shell>
</x-app>
