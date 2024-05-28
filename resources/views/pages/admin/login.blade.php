<x-app>
    <x-slot:title>{{ $title  }}</x-slot:title>
    <div class="font-[sans-serif] text-[#333]">
        <div class="min-h-screen flex flex-col items-center justify-center py-6 px-4 relative">
        <p class="mt-10 lg:absolute absolute top-0 left-10">
            <a href="/" class="flex w-fit align-middle gap-2 text-white font-semibold hover:underline ml-1 bg-black rounded-md px-2 py-1">
                <i class="fa-solid fa-arrow-left pt-1"></i>
                Back to home
            </a>
        </p>
            <div class="grid md:grid-cols-2 items-center gap-10 max-w-6xl w-full">
                <div class="max-md:text-center">
                    <h2 class="lg:text-5xl text-4xl font-extrabold lg:leading-[55px]">
                        Seamless Login for Exclusive Access
                    </h2>
                    <p class="text-sm mt-6">Immerse yourself in a hassle-free login journey with our intuitively
                        designed login form. Effortlessly access your account.</p>
                </div>
                <form class="space-y-6 max-w-md md:ml-auto max-md:mx-auto w-full" method="post" action="{{ route('admin.auth.authenticate') }}">
                    @csrf
                    <h3 class="text-3xl font-extrabold mb-8 max-md:text-center">
                        Sign in
                    </h3>
                    @if(isset($errors))
                        @error('error')
                            <div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50" role="alert">
                                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <span class="sr-only">Info</span>
                                <div class="ms-3 text-sm font-medium">
                                    {{ $message }}
                                </div>
                                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-2" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                </button>
                            </div>
                        @enderror
                    @endif
                    <div>
                        <input name="username" type="text" autocomplete="email" required
                               class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md outline-blue-600 invalid"
                               placeholder="Username" value="{{ old('username') }}"/>
                    </div>
                    <div>
                        <input name="password" type="password" autocomplete="current-password" required
                               class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md outline-blue-600"
                               placeholder="Password"/>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox"
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"/>
                            <label for="remember-me" class="ml-3 block text-sm">
                                Remember me
                            </label>
                        </div>
                    </div>
                    <div class="!mt-10">
                        <button type="submit"
                                class="w-full shadow-xl py-2.5 px-4 text-sm font-semibold rounded text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                            Log in
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app>
