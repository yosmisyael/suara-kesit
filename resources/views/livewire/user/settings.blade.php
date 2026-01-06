<section class="grid grid-cols-1 md:grid-cols-2 gap-20">
    <form wire:submit="save">
        <h1 class="text-2xl font-semibold ">Personal Information</h1>

        {{-- name field --}}
        <div class="mt-6 text-lg">
            <label for="name" class="font-semibold">Full Name</label>
            <input type="text" wire:model.blur="form.name" id="name" class="border-b-2 focus:outline-none p-4 block w-full">
            @error('form.name')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        {{-- email field --}}
        <div class="mt-6 text-lg">
            <label for="email" class="font-semibold">Email</label>
            <input type="email" wire:model.blur="form.email" id="email" placeholder="example@example.com" class="border-b-2 focus:outline-none p-4 block w-full">
            @error('form.email')
            <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        {{-- password field --}}
        <div class="mt-6 text-lg">
            <label for="password" class="font-semibold">Password</label>
            <input type="password" wire:model.blur="form.password" id="password" placeholder="Create a strong password" class="border-b-2 focus:outline-none p-4 block w-full">
            @error('form.password')
            <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        {{-- country field --}}
        <div class="mt-6 text-lg">
            <label for="country" class="font-semibold">Country</label>
            <select id="country"
                    wire:model.blur="form.country"
                    class="block w-full p-4 border-b-2 bg-transparent text-gray-900
               focus:border-black focus:ring-0 focus:outline-none"
            >
                <option value="" disabled>Select your country</option>
                @foreach($countries as $code => $name)
                    <option value="{{ $code }}">{{ $name }}</option>
                @endforeach
            </select>
            @error('form.country')
            <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        {{-- submit button --}}
        <button type="submit" class="btn-primary mt-6">
            <span wire:loading.remove wire:target="save">Save Changes</span>
            <span wire:loading wire:target="save">Saving...</span>
        </button>

        {{-- account deletion --}}
        <div class="mt-6 text-lg">
            <h5 class="font-semibold">Account Deletion</h5>
            <p class="text-base font-medium max-w-[50ch] text-gray-600">
                Deleting your account will permanently remove your profile and all related information to your account.
            </p>
            <a href="" class="btn-primary bg-red-500 border-red-500 block mt-4 w-fit">Delete my accont</a>
        </div>
    </form>

    {{-- Preferences --}}
    <form action="">
        <h1 class="text-2xl font-semibold ">Personalization</h1>
        {{-- subscription field --}}
        <div class="mt-6 text-lg">
            <h5 class="font-medium">Subscription</h5>
            <p class="text-base font-medium max-w-[50ch] text-gray-600">
                Subscribe to our newsletter to get the latest industry news, product updates, and insights delivered straight to your inbox.
            </p>
            <label for="subscription" class="relative inline-flex items-center cursor-pointer mt-6">
                <input type="checkbox" name="subscription" id="subscription" class="sr-only peer" wire:click="toggleSubscription" @checked($subscription)>
                <div class="w-14 h-8 bg-white border-2 border-black rounded-full peer peer-focus:ring-0 peer-checked:bg-black transition-colors duration-300 ease-in-out"></div>

                <div class="absolute left-1.25 top-1.2 w-5.5 h-5.5 bg-black rounded-full transition-all duration-300 ease-in-out peer-checked:translate-x-6 peer-checked:bg-white"></div>

                <span class="ml-3 font-medium text-black">{{ $subscription ? 'Subscribed' : 'Send me updates' }}</span>
            </label>
        </div>
    </form>
</section>
