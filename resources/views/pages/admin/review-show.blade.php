@php use App\Enums\Status;use Carbon\Carbon; @endphp

<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-dashboard-shell>
        <div class="w-full grid grid-cols-1 lg:grid-cols-3 gap-5 relative">
            <header
                class="lg:col-span-3 mb-5 flex flex-col gap-1 text-black rounded-lg p-5 bg-gradient-to-l from-indigo-100 to-fuchsia-200 via-stone-100 shadow-lg text-slate-700">
                <h1 class="text-4xl font-medium">{{ explode('|', $title)[1] }}</h1>
            </header>

            @if(isset($errors))
                @error('error')
                <div class="w-max left-1/2 -translate-x-1/2 absolute top-0 z-10">
                    <div class="flex rounded-md bg-green-100 p-4 text-sm text-green-500" x-cloak x-show="showAlert"
                         x-data="{ showAlert: true }">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                             class="mr-3 h-5 w-5 flex-shrink-0">
                            <path fill-rule="evenodd"
                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                  clip-rule="evenodd"/>
                        </svg>
                        <div><b>Operation Failed.</b> {{ $message }}</div>
                        <button class="ml-auto" x-on:click="showAlert = false">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                 class="h-5 w-5">
                                <path
                                    d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z"/>
                            </svg>
                        </button>
                    </div>
                </div>
                @enderror
            @endif

            <div class="col-span-2 space-y-2">
                <h2 class="lg:col-span-3 col-span-1 text-3xl font-medium bg-slate-600 py-2 px-4 rounded-lg w-fit">
                    <span
                        class="bg-gradient-to-l from-indigo-200 to-fuchsia-200 via-stone-200 bg-clip-text text-transparent">Review Result</span>
                </h2>
                <div class="col-span-1 lg:col-span-3 p-5 rounded-lg shadow-lg">
                    {!! $submission->review->note !!}
                </div>
            </div>

            <div class="col-span-1 space-y-2" style="height: fit-content">
                <h2 class="text-3xl font-medium bg-slate-600 py-2 px-4 rounded-lg w-fit">
                    <span
                        class="bg-gradient-to-l from-indigo-200 to-fuchsia-200 via-stone-200 bg-clip-text text-transparent">Detail</span>
                </h2>
                <section
                    class="rounded-lg p-5 bg-white shadow-lg text-slate-700">
                    <h4 class="text-xl font-medium mt-5">Author Information</h4>
                    <div class="space-y-5">
                        <div class="grid grid-cols-3 items-center">
                            <div class="col-span-1 block text-sm font-medium text-gray-700">Name</div>
                            <div class="col-span-2 w-full rounded-md bg-white p-3 border-[1px] shadow-sm">
                                {{ $submission->post->user->name }}
                            </div>
                        </div>
                        <div class="grid grid-cols-3 items-center">
                            <div class="col-span-1 block text-sm font-medium text-gray-700">Username</div>
                            <div class="col-span-2 w-full rounded-md bg-white p-3 border-[1px] shadow-sm">
                                {{ $submission->post->user->username }}
                            </div>
                        </div>
                    </div>

                    <div class="space-y-5">
                        <h4 class="text-xl font-medium mt-5">Post Information</h4>
                        <div class="grid grid-cols-3 items-center">
                            <div class="col-span-1 block text-sm font-medium text-gray-700">Post ID</div>
                            <div class="col-span-2 w-full rounded-md bg-white p-3 border-[1px] shadow-sm">
                                {{ $submission->id }}
                            </div>
                        </div>
                    </div>
                    <div class="space-y-5">
                        <h4 class="text-xl font-medium mt-5">Submission Information</h4>
                        <div class="grid grid-cols-3 items-center">
                            <div class="col-span-1 block text-sm font-medium text-gray-700">Post submitted on</div>
                            <div class="col-span-2 w-full rounded-md bg-white p-3 border-[1px] shadow-sm">
                                {{ Carbon::parse($submission->created_at)->format('d F Y H:i:s') }}
                            </div>
                        </div>
                        <div class="grid grid-cols-3 items-center">
                            <div class="col-span-1 block text-sm font-medium text-gray-700">Reviewed on</div>
                            <div class="col-span-2 w-full rounded-md bg-white p-3 border-[1px] shadow-sm">
                                {{ Carbon::parse($submission->review->created_at)->format('d F Y H:i:s') }}
                            </div>
                        </div>
                        <div class="grid grid-cols-3 items-center">
                            <div class="col-span-1 block text-sm font-medium text-gray-700">Status</div>
                            <div class="col-span-2 w-full capitalize">
                                @switch($submission->review->status)
                                    @case(Status::Approved)
                                        <span
                                            class="inline-flex items-center gap-1 rounded-md bg-green-100 px-4 py-2 text-sm font-semibold text-green-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                 class="w-5 h-5 fill-green-600">
                                                <path
                                                    d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path>
                                            </svg>
                                            {{ $submission->review->status }}
                                        </span>
                                        @break
                                    @case(Status::Rejected)
                                        <span
                                            class="inline-flex items-center gap-1 rounded-md bg-red-100 px-4 py-2 text-sm font-semibold text-red-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                 class="w-5 h-5 fill-red-600">
                                                <path
                                                    d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path>
                                            </svg>
                                            {{ $submission->review->status }}
                                        </span>
                                        @break
                                @endswitch
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div class="w-full mt-5">
            <a href="{{ route('admin.post.edit', ['id' => $postId]) }}"
               class="inline-flex items-center gap-1.5 rounded-lg border border-black bg-black px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-gray-200 hover:bg-black focus:ring focus:ring-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-white" viewBox="0 0 24 24">
                    <path
                        d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path>
                </svg>
                Back
            </a>
        </div>
    </x-dashboard-shell>
</x-app>
