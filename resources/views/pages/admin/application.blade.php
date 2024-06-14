@php use App\Enums\Status;use Carbon\Carbon; @endphp
<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-dashboard-shell>
        <div class="mx-auto w-full xl:w-1/2">
            @error('error')
            <div class="flex rounded-md bg-red-50 p-4 text-sm text-red-500 mb-5" x-cloak x-show="showAlert"
                 x-data="{ showAlert: true }">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                     class="mr-3 h-5 w-5 flex-shrink-0">
                    <path fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                          clip-rule="evenodd"/>
                </svg>

                <div><b>Operation failed.</b> {{ $message }}</div>
                <button class="ml-auto" x-on:click="showAlert = false">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                        <path
                            d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z"/>
                    </svg>
                </button>
            </div>
            @enderror

            <div
                class="w-full border-[1px] shadow-lg rounded-lg p-5 bg-white">
                <h1 class="text-4xl font-medium">Author Application Review</h1>
                <h4 class="text-xl font-medium mt-5">User Detail</h4>
                <div class="space-y-5">
                    <div class="grid grid-cols-3 items-center">
                        <div class="col-span-1 block text-sm font-medium text-gray-700">Email</div>
                        <div class="col-span-2 w-full rounded-md bg-white p-3 border-[1px] shadow-sm">
                            {{ $application->user->email }}
                        </div>
                    </div>
                    <div class="grid grid-cols-3 items-center">
                        <div class="col-span-1 block text-sm font-medium text-gray-700">Name</div>
                        <div class="col-span-2 w-full rounded-md bg-white p-3 border-[1px] shadow-sm">
                            {{ $application->user->name }}
                        </div>
                    </div>
                    <div class="grid grid-cols-3 items-center">
                        <div class="col-span-1 block text-sm font-medium text-gray-700">Username</div>
                        <div class="col-span-2 w-full rounded-md bg-white p-3 border-[1px] shadow-sm">
                            {{ $application->user->username }}
                        </div>
                    </div>
                    <div class="grid grid-cols-3 items-center">
                        <div class="col-span-1 block text-sm font-medium text-gray-700">Registration Date</div>
                        <div class="col-span-2 w-full rounded-md bg-white p-3 border-[1px] shadow-sm">
                            {{ Carbon::parse($application->user->created_at)->format('d F Y') }}
                        </div>
                    </div>

                    <h4 class="text-xl font-medium mt-5">User Credentials</h4>
                    <div class="grid grid-cols-3 items-center">
                        <div class="col-span-1 block text-sm font-medium text-gray-700">Application ID</div>
                        <div class="col-span-2 w-full rounded-md bg-white p-3 border-[1px] shadow-sm">
                            {{ $application->id }}
                        </div>
                    </div>
                    <div class="grid grid-cols-3 items-center">
                        <div class="col-span-1 block text-sm font-medium text-gray-700">Token</div>
                        <div class="col-span-2 w-full rounded-md bg-white p-3 border-[1px] shadow-sm">
                            {{ $application->token }}
                        </div>
                    </div>
                    <div class="grid grid-cols-3 items-center">
                        <div class="col-span-1 block text-sm font-medium text-gray-700">Request submitted on</div>
                        <div class="col-span-2 w-full rounded-md bg-white p-3 border-[1px] shadow-sm">
                            {{ Carbon::parse($application->created_at)->format('d F Y H:i:s') }}
                        </div>
                    </div>
                    @switch($application->status)
                        @case(Status::Pending)
                            <div class="grid grid-cols-3 items-center">
                                <div class="col-span-2 col-start-2">
                                    <form
                                        action="{{ route('admin.application.verify', ['id' => $application->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                                class="rounded-lg border border-primary bg-primary px-5 py-2.5 text-center text-sm font-semibold text-white shadow-sm transition-all hover:border-primary focus:ring focus:ring-secondary cursor-pointer">
                                            Verify
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @break
                        @case(Status::Approved)
                            <div class="w-full p-5 rounded-lg shadow-sm bg-green-200 text-green-500">
                                <p class="text-md"><span
                                        class="font-semibold uppercase">{{ $application->status }}.</span> This
                                    application has been verified and approved
                                    on {{ Carbon::parse($application->updated_at)->format('d F Y H:i:s') }} </p>
                            </div>
                            @break
                        @case(Status::Rejected)
                            <div class="w-full p-5 rounded-lg shadow-sm bg-red-200 text-red-500">
                                <p class="text-md"><span
                                        class="font-semibold uppercase">{{ $application->status }}.</span> This
                                    application has been verified and approved
                                    on {{ Carbon::parse($application->updated_at)->format('d F Y H:i:s') }} </p>
                            </div>
                            @break
                    @endswitch

                </div>
            </div>

            <div class="w-full mt-5">
                <a href="{{ route('admin.application.index') }}"
                   class="mt-10 inline-flex items-center gap-1.5 rounded-lg border border-primary bg-primary px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all focus:ring focus:ring-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-white" viewBox="0 0 24 24">
                        <path
                            d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path>
                    </svg>
                    Back
                </a>
            </div>
        </div>
    </x-dashboard-shell>
</x-app>
