@php use App\AuthorApplicationStatus;use Carbon\Carbon; @endphp
<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-dashboard-shell>
        <div class="mx-auto w-full xl:w-1/2">
            <div class="w-full border-[1px] shadow-lg rounded-lg p-5">
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
                        @case(AuthorApplicationStatus::Pending)
                            <div class="grid grid-cols-3 items-center">
                                <div class="col-span-2 col-start-2">
                                    <form
                                        action="{{ route('admin.application.verification', ['id' => $application->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                                class="rounded-lg border border-blue-500 bg-blue-500 px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-blue-700 hover:bg-blue-700 focus:ring focus:ring-blue-200 disabled:cursor-not-allowed disabled:border-blue-300 disabled:bg-blue-300">
                                            Verify
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @break
                        @case(AuthorApplicationStatus::Approved)
                            <div class="w-full p-5 rounded-lg shadow-sm bg-green-200 text-green-500">
                                <p class="text-md"><span
                                        class="font-semibold uppercase">{{ $application->status }}.</span> This
                                    application has been verified and approved
                                    on {{ Carbon::parse($application->updated_at)->format('d F Y H:i:s') }} </p>
                            </div>
                            @break
                        @case(AuthorApplicationStatus::Rejected)
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
