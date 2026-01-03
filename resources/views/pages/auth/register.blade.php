<x-layouts.public :title="$title">
    <section class="px-5 md:px-10 xl:px-36 py-12 mb-12 mt-18.75">
        <h1 class="uppercase lg:text-8xl font-black text-center">Become an Insider</h1>
        <p class="max-w-md text-center mx-auto mt-15">
            Registration unlocks deep-dive analysis, exclusive commentary
            privileges, and access to subscriber-only editorial responses. Join our
            community of informed readers.
        </p>
        <form action="{{ route('public.signup.handle') }}" method="post"
              class="mx-auto flex flex-col gap-16 items-center mt-20 md:max-w-md">
            @csrf
            <div class="w-full">
                <input name="name"
                       type="text"
                       placeholder="Full Name"
                       class="focus:outline-none py-4 border-b-2 border-black w-full"
                       value="{{ old('name') ?? '' }}"
                >
                @error('name')
                <p class="form-error">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="w-full">
                <input name="email" type="email" placeholder="Email Address"
                       value="{{ old('email') ?? '' }}"
                       class="focus:outline-none py-4 border-b-2 border-black w-full ">
                @error('email')
                <p class="form-error">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="w-full">
                <input name="password" type="password" placeholder="Create Strong Password"
                       class="focus:outline-none py-4 border-b-2 border-black w-full">
                @error('password')
                <p class="form-error">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="w-full">
                <input name="confirm_password" type="password" placeholder="Confirm Your Password"
                       class="focus:outline-none py-4 border-b-2 border-black w-full">
                @error('confirm_password')
                <p class="form-error">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="w-full">
                <button type="submit" class="btn-primary py-4 w-full">Register</button>
                <p class="text-sm font-semibold text-gray-600 text-center mt-3">
                    Already become member?
                    <a href="{{ route('public.login') }}" class="text-black">Login here.</a>
                </p>
            </div>
        </form>
    </section>
</x-layouts.public>
