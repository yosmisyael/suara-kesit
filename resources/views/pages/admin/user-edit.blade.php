<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-dashboard-shell>

        <div class="mx-auto max-w-xl">
            <form action="{{ route('admin.user.update', ['id' => $user->id]) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-3 items-center">
                    <label for="name" class="col-span-1 block text-sm font-medium text-gray-700">Name</label>
                    <div class="col-span-2">
                        <input type="text" id="name" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-400 focus:ring focus:ring-primary-200 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500" placeholder="enter name here" value="{{ old('name') ?? $user->name }}" />
                    </div>
                </div>
                <div class="grid grid-cols-3 items-center">
                    <label for="username" class="col-span-1 block text-sm font-medium text-gray-700">Username</label>
                    <div class="col-span-2">
                        <input type="text" id="username" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-400 focus:ring focus:ring-primary-200 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500" placeholder="enter username here" value="{{ old('username') ?? $user->username }}" />
                    </div>
                </div>
                <div class="grid grid-cols-3 items-center">
                    <label for="email" class="col-span-1 block text-sm font-medium text-gray-700">Email</label>
                    <div class="col-span-2">
                        <input type="email" id="email" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-400 focus:ring focus:ring-primary-200 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500" placeholder="enter email here" value="{{ old('email') ?? $user->email }}" />
                    </div>
                </div>
                <div class="grid grid-cols-3 items-center">
                    <div class="col-span-2 col-start-2">
                        <button type="submit" class="rounded-lg border border-blue-500 bg-blue-500 px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-blue-700 hover:bg-blue-700 focus:ring focus:ring-blue-200 disabled:cursor-not-allowed disabled:border-blue-300 disabled:bg-blue-300">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </x-dashboard-shell>
</x-app>
