<x-layouts.public :title="$title">
    <section class="px-5 md:px-10 xl:px-36 py-12 mb-12 mt-18.75">
        <form action="{{ route('public.login.handle') }}" method="post" class="mx-auto flex flex-col gap-8 items-center md:max-w-md border-2 border-black p-6">
            @csrf
            <h1 class="text-3xl font-black w-full">Welcome Back</h1>
            @error('auth')
            <div class="w-full bg-red-50 p-4">
                <p class="form-error">
                    <span class="font-bold">Authentication Error.</span>{{ $message }}
                </p>
            </div>
            @enderror
            <div class="w-full">
                <label for="name" class="font-semibold">Email Address</label>
                <input name="email" id="name" type="email" placeholder="email@example.com" class="focus:outline-none p-4 border-2 border-black w-full mt-2">
                @error('email')
                <p class="form-error">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="w-full">
                <label for="password" class="font-semibold">Password</label>
                <input name="password" id="password" type="password" placeholder="Enter your password" class="focus:outline-none p-4 border-2 border-black w-full mt-2">
                @error('password')
                <p class="form-error">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="w-full">
                <button type="submit" class="btn-primary py-4 w-full">Login</button>
                <a href="#" class="text-sm block font-semibold text-gray-600 text-center mt-3">
                    Forgot your password?
                </a>
            </div>
            <div class="w-full border-t-2 border-black pt-8">
                <button type="submit" class="btn-secondary py-4 w-full inline-flex gap-3 justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-auto h-6" viewBox="0 0 512 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M500 261.8C500 403.3 403.1 504 260 504 122.8 504 12 393.2 12 256S122.8 8 260 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9c-88.3-85.2-252.5-21.2-252.5 118.2 0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9l-140.8 0 0-85.3 236.1 0c2.3 12.7 3.9 24.9 3.9 41.4z"/></svg>
                    Login with Google
                </button>
                <button type="submit" class="btn-secondary py-4 w-full mt-3 inline-flex gap-3 justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-auto h-6" viewBox="0 0 448 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M0 32l214.6 0 0 214.6-214.6 0 0-214.6zm233.4 0l214.6 0 0 214.6-214.6 0 0-214.6zM0 265.4l214.6 0 0 214.6-214.6 0 0-214.6zm233.4 0l214.6 0 0 214.6-214.6 0 0-214.6z"/></svg>
                    Login with Microsoft
                </button>
                <p class="text-sm font-semibold text-gray-600 text-center mt-3">
                    Didn't have account yet?
                    <a href="{{ route('public.signup') }}" class="text-black">Register here.</a>
                </p>
            </div>
        </form>
    </section>
</x-layouts.public>
