@php use Illuminate\Support\Str; @endphp
<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-dashboard-shell>
        <section class="relative">
            @if(session('success'))
                <div class="w-fit left-1/2 -translate-x-1/2 top-0 relative z-50">
                    <div class="flex rounded-md bg-green-100 p-4 text-sm text-green-500" x-cloak x-show="showAlert"
                         x-data="{ showAlert: true }">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                             class="mr-3 h-5 w-5 flex-shrink-0">
                            <path fill-rule="evenodd"
                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                  clip-rule="evenodd"/>
                        </svg>
                        <div><b>Success Alert.</b> {{ session()->get('success') }}</div>
                        <button class="ml-auto" x-on:click="showAlert = false">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                 class="h-5 w-5">
                                <path
                                    d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            <div class="mx-auto max-w-xl mt-12">
                <div class="bg-white shadow-lg p-5 rounded-lg">
                    <h1 class="text-4xl font-medium text-center mb-10">User Registration</h1>
                    <form action="{{ route('admin.user.store') }}" method="POST" class="space-y-5" x-data="{
                        form: $form('post', '/control-panel/user/store', {
                            name: '{{ old('name')}}',
                            username: '{{ old('username')}}',
                            email: '{{ old('email')}}',
                            password: '{{ old('password')}}',
                            role: '{{ old('role')}}'
                        }).setErrors({{ Js::from($errors->messages()) }})
                    }">
                        @csrf
                        <div class="grid grid-cols-3 items-center">
                            <label for="name" class="col-span-1 block text-sm font-medium text-gray-700">Name</label>
                            <div class="col-span-2">
                                <input name="name" type="text" id="name"
                                       class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                                       placeholder="enter name here" required
                                       x-model="form.name"
                                       @change="form.validate('name')"/>
                            </div>
                        </div>
                        <template x-if="form.invalid('name')">
                            <div x-text="form.errors.name"></div>
                        </template>
                        <div class="grid grid-cols-3 items-center">
                            <label for="username"
                                   class="col-span-1 block text-sm font-medium text-gray-700">Username</label>
                            <div class="col-span-2">
                                <input name="username" type="text" id="username"
                                       class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500"
                                       placeholder="enter username here" required
                                       x-model="form.username"
                                       @change="form.validate('username')"/>
                                <template x-if="form.invalid('username')">
                                    <div x-text="form.errors.username" class="text-sm text-red-500"></div>
                                </template>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 items-center">
                            <label for="email" class="col-span-1 block text-sm font-medium text-gray-700">Email</label>
                            <div class="col-span-2">
                                <input name="email" type="email" id="email"
                                       class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500"
                                       placeholder="enter email here" required
                                       x-model="form.email"
                                       @change="form.validate('email')"/>
                                <template x-if="form.invalid('email')">
                                    <div x-text="form.errors.email" class="text-sm text-red-500"></div>
                                </template>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 items-center">
                            <label for="password"
                                   class="col-span-1 block text-sm font-medium text-gray-700">Password</label>
                            <div class="col-span-2">
                                <input name="password" type="password" id="password"
                                       class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500"
                                       placeholder="enter password here" required
                                       x-model="form.password"
                                       @change="form.validate('password')"/>
                                <template x-if="form.invalid('password')">
                                    <div x-text="form.errors.password" class="text-sm text-red-500"></div>
                                </template>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 items-center">
                            <label for="role" class="col-span-1 block text-sm font-medium text-gray-700">Role</label>
                            <div class="max-w-xs w-full col-span-2">
                                <select name="role" id="role"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                                        required
                                        x-model="form.role"
                                        @change="form.validate('role')">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}">{{ Str::title($role->name) }}</option>
                                    @endforeach
                                    <template x-if="form.invalid('role')">
                                        <div x-text="form.errors.role" class="text-sm text-red-500"></div>
                                    </template>
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 items-center">
                            <div class="col-span-2 col-start-2 justify-end">
                                <button type="submit"
                                        class="rounded-lg border border-primary bg-primary px-5 py-2.5 text-center text-sm font-semibold text-white shadow-sm transition-all hover:border-primary hover:bg-slate-700 focus:ring focus:ring-slate-200"
                                        :disabled="form.processing">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="w-full mt-5">
                    <a href="{{ route('admin.user.index') }}"
                       class="inline-flex items-center gap-1.5 rounded-lg border border-black bg-primary px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-white" viewBox="0 0 24 24">
                            <path
                                d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path>
                        </svg>
                        Back
                    </a>
                </div>
            </div>
        </section>
    </x-dashboard-shell>
</x-app>
