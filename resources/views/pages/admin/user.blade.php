<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-dashboard-shell>
        <h1 class="text-5xl font-bold my-2">Stats</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
            <div
                class="shadow-lg rounded-lg bg-white h-32 md:h-32 flex p-4 items-center bg-gradient-to-r from-indigo-400 to-blue-700 text-white"
            >
                <div class="flex-auto text-2xl font-semibold">
                    All Active Users
                </div>
                <h1 class="flex-1 text-4xl font-bold">1000</h1>
            </div>
            <div
                class="shadow-lg rounded-lg bg-white h-32 md:h-32 flex p-4 items-center bg-gradient-to-r from-indigo-400 to-blue-700 text-white"
            >
                <div class="flex-auto text-2xl font-semibold">
                    Member Total
                </div>
                <h1 class="flex-1 text-4xl font-bold">1000</h1>
            </div>
            <div
                class="shadow-lg rounded-lg bg-white h-32 md:h-32 flex p-4 items-center bg-gradient-to-r from-indigo-400 to-blue-700 text-white"
            >
                <div class="flex-auto text-2xl font-semibold">
                    Author Total
                </div>
                <h1 class="flex-1 text-4xl font-bold">1000</h1>
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
        <h1 class="text-5xl font-bold my-2">Features</h1>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <a href="{{ route('admin.user.create') }}"
                class="shadow-lg rounded-lg col-span-2 md:col-span-1 h-56 p-4 flex gap-4 items-center hover:cursor-pointer bg-gradient-to-r from-red-500 to-orange-400 text-white"
            >
                <div>
                    <i class="fa-solid fa-address-book text-7xl md:text-9xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl md:text-4xl font-bold">Registration</h1>
                    <p class="text-lg md:text-2xl">Streamline user onboarding with effortless registration management.</p>
                </div>
            </a>
            <a href="{{ route('admin.user.member') }}"
                class="shadow-lg rounded-lg col-span-2 md:col-span-1 h-56 p-4 gap-4 flex items-center hover:cursor-pointer bg-gradient-to-r from-red-500 to-orange-400 text-white"
            >
                <div>
                    <i class="fa-solid fa-users-gear text-7xl md:text-9xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl md:text-4xl font-bold">Member Management</h1>
                    <p class="text-lg md:text-2xl">Simplify member oversight with centralized account control.</p>
                </div>
            </a>
            <a href="{{ route('admin.user.author') }}"
                class="shadow-lg rounded-lg col-span-2 md:col-span-1 h-56 p-4 flex gap-4 items-center hover:cursor-pointer bg-gradient-to-r from-red-500 to-orange-400 text-white"
            >
                <div>
                    <i class="fa-solid fa-feather text-7xl md:text-9xl"></i>
                </div>

                <div>
                    <h1 class="text-2xl md:text-4xl font-bold">Author Management</h1>
                    <p class="text-lg md:text-2xl">Manage author accounts and content with ease.</p>
                </div>
            </a>
            <a href="{{ route('admin.user.index') }}"
                class="shadow-lg rounded-lg col-span-2 md:col-span-1 h-56 p-4 flex gap-4 items-center hover:cursor-pointer bg-gradient-to-r from-red-500 to-orange-400 text-white"
            >
                <div>
                    <i class="fa-solid fa-user-check text-7xl md:text-9xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl md:text-4xl font-bold">Author Application</h1>
                    <p class="text-lg md:text-2xl">Effortlessly onboard new authors through streamlined requests.</p>
                </div>
            </a>
        </div>
    </x-dashboard-shell>
</x-app>
