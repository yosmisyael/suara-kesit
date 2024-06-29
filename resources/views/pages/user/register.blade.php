<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <img class="mx-auto h-10 w-auto" src="{{ asset('kesit.png') }}" alt="Workflow">
            <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
                Create a new account
            </h2>
            <p class="mt-2 text-center text-sm leading-5 text-gray-500 max-w">
                Or
                <a href="{{ route('user.auth.login') }}"
                   class="font-medium text-blue-600 hover:text-blue-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                    login to your account
                </a>
            </p>
        </div>
        @if(isset($errors))
            @error('error')
            <div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 w-fit mx-auto mt-2"
                 role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">{{ $message }}</div>
                <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8"
                        data-dismiss-target="#alert-2" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            @enderror
        @endif
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form method="POST" action="{{ route('user.auth.store') }}" x-data="{
                        form: $form('post', '/control-panel/user/store', {
                            name: '{{ old('name') }}',
                            username: '{{ old('username') }}',
                            email: '{{ old('email') }}',
                            password: '{{ old('password') }}',
                            password_confirmation: '{{ old('password_confirmation') }}',
                        }).setErrors({{ Js::from($errors->messages()) }})
                    }">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium leading-5  text-gray-700">Name</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input id="name" name="name" placeholder="John Doe" type="text" required
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                   x-model="form.name"
                                   @change="form.validate('name')"/>
                            <template x-if="form.invalid('name')">
                                <div x-text="form.errors.name" class="text-sm text-red-500"></div>
                            </template>
                            <div class="hidden absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                          clip-rule="evenodd">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="username" class="block text-sm font-medium leading-5 text-gray-700">Username</label>
                        <div class="mt-1 flex flex-col rounded-md shadow-sm">
                            <input id="username" name="username" placeholder="john" type="text" required
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" x-model="form.username"
                                   @change="form.validate('username')"/>
                            <template x-if="form.invalid('username')">
                                <div x-text="form.errors.username" class="text-sm text-red-500"></div>
                            </template>
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="email" class="block text-sm font-medium leading-5  text-gray-700">
                            Email address
                        </label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input id="email" name="email" placeholder="user@example.com" type="email" required
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5
                " x-model="form.email"
                                   @change="form.validate('email')"/>
                            <template x-if="form.invalid('email')">
                                <div x-text="form.errors.email" class="text-sm text-red-500"></div>
                            </template>
                            <div class="hidden absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="password" class="block text-sm font-medium leading-5 text-gray-700">
                            Password
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="password" name="password" type="password" required
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" x-model="form.password"
                                   @change="form.validate('password')"/>
                            <template x-if="form.invalid('password')">
                                <div x-text="form.errors.password" class="text-sm text-red-500"></div>
                            </template>
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="password_confirmation" class="block text-sm font-medium leading-5 text-gray-700">
                            Confirm Password
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="password_confirmation" name="password_confirmation" type="password" required=""
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" x-model="form.password_confirmation"
                                   @change="form.validate('password_confirmation')">
                            <template x-if="form.invalid('password_confirmation')">
                                <div x-text="form.errors.password_confirmation" class="text-sm text-red-500"></div>
                            </template>
                        </div>
                    </div>

                    <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
            <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out" :disabled="form.processing">
              Create account
            </button>
          </span>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app>
