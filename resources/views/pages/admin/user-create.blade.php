@php use Illuminate\Support\Str; @endphp
<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-dashboard-shell>

        <div class="mx-auto max-w-xl">
            <div class="bg-gradient-to-r from-indigo-50 via-gray-50 to-pink-50 shadow-lg p-5 rounded-lg">
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
                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-400 focus:ring focus:ring-primary-200 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500"
                                   placeholder="enter name here" required
                                   x-model="form.name"
                                   @change="form.validate('name')"/>
                        </div>
                    </div>
                    <template x-if="form.invalid('name')">
                        <div x-text="form.errors.name"></div>
                    </template>
                    <div class="grid grid-cols-3 items-center">
                        <label for="username" class="col-span-1 block text-sm font-medium text-gray-700">Username</label>
                        <div class="col-span-2">
                            <input name="username" type="text" id="username"
                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-400 focus:ring focus:ring-primary-200 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500"
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
                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-400 focus:ring focus:ring-primary-200 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500"
                                   placeholder="enter email here" required
                                   x-model="form.email"
                                   @change="form.validate('email')"/>
                            <template x-if="form.invalid('email')">
                                <div x-text="form.errors.email" class="text-sm text-red-500"></div>
                            </template>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 items-center">
                        <label for="password" class="col-span-1 block text-sm font-medium text-gray-700">Password</label>
                        <div class="col-span-2">
                            <input name="password" type="password" id="password"
                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-400 focus:ring focus:ring-primary-200 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500"
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
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50"
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
                                    class="rounded-lg border border-slate-600 bg-slate-600 px-5 py-2.5 text-center text-sm font-semibold text-white shadow-sm transition-all hover:border-slate-600 hover:bg-slate-700 focus:ring focus:ring-slate-200 disabled:cursor-not-allowed disabled:border-slate-300 disabled:bg-slate-300"
                                    :disabled="form.processing">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="w-full mt-5">
                <a href="{{ route('admin.user.index') }}"
                   class="inline-flex items-center gap-1.5 rounded-lg border border-black bg-black px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-gray-200 hover:bg-black focus:ring focus:ring-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-white" viewBox="0 0 24 24">
                        <path d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path>
                    </svg>
                    Back
                </a>
            </div>
        </div>
    </x-dashboard-shell>
</x-app>
