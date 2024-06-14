@php use Carbon\Carbon; @endphp
<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-dashboard-shell>
        <div class="w-full grid grid-cols-1 lg:grid-cols-3 gap-5 relative">
            <header
                class="lg:col-span-3 mb-5">
                <h1 class="text-5xl font-black">{{ explode('|', $title)[1] }}</h1>
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

            <div
                class="lg:col-span-2 w-full space-y-2">
                <h2 class="text-3xl font-bold text-primary rounded-lg w-fit font-bold">Post
                </h2>
                <article
                    class="shadow-lg rounded-lg p-5 bg-white p-5 mx-auto">
                    <header class="text-4xl font-semibold text-center">{{ $submission->post->title }}</header>
                    <main>{{ $submission->post->content }}</main>
                </article>
            </div>

            <div class="col-span-1 space-y-2" style="height: fit-content">
                <h2 class="text-3xl font-bold text-primary rounded-lg w-fit font-bold">Submission Detail
                </h2>
                <section
                    class="rounded-lg p-5 bg-white shadow-lg text-slate-700">
                    <h4 class="text-xl font-medium mt-5">Author Detail</h4>
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
                    <h4 class="text-xl font-medium mt-5">Post Detail</h4>
                    <div class="space-y-5">
                        <div class="grid grid-cols-3 items-center">
                            <div class="col-span-1 block text-sm font-medium text-gray-700">Post ID</div>
                            <div class="col-span-2 w-full rounded-md bg-white p-3 border-[1px] shadow-sm">
                                {{ $submission->post->id }}
                            </div>
                        </div>
                        <div class="grid grid-cols-3 items-center">
                            <div class="col-span-1 block text-sm font-medium text-gray-700">Published by submission
                            </div>
                            <div class="col-span-2 w-full rounded-md bg-white p-3 border-[1px] shadow-sm">
                                {{ $submission->post->title }}
                            </div>
                        </div>
                        <div class="grid grid-cols-3 items-center">
                            <div class="col-span-1 block text-sm font-medium text-gray-700">Post submitted on</div>
                            <div class="col-span-2 w-full rounded-md bg-white p-3 border-[1px] shadow-sm">
                                {{ Carbon::parse($submission->created_at)->format('d F Y H:i:s') }}
                            </div>
                        </div>
                        <div class="grid grid-cols-3 items-center space-y-5">
                            <div class="col-span-3 block text-xl font-medium text-gray-700">Author Notes</div>
                            <div class="col-span-3 w-full rounded-md bg-white p-3 border-[1px] shadow-sm">
                                @if($submission->note !== '')
                                    {{ $submission->note }}
                                @else
                                    Author didn't leave any message.
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <form action="{{ route('admin.review.store', ['id' => $submission->id]) }}" method="post"
                  class="col-span-3 space-y-2">
                <h2 class="lg:col-span-3 col-span-1 text-3xl font-bold text-primary rounded-lg w-fit">Review Form
                </h2>
                <div class="grid lg:grid-cols-3 grid-cols-1 gap-5">
                    <div class="col-span-1 lg:col-span-2 flex flex-col">
                        <div
                            class="bg-white shadow-lg p-5 rounded-lg">
                            @csrf
                            <input type="hidden" name="submission_id" value="{{ $submission->id }}">
                            <div class="grid grid-cols-3 items-center gap-1">
                                <div class="col-span-3 block text-md font-medium text-gray-700">Review Note</div>
                                <div class="col-span-3 w-full rounded-md border-[1px] shadow-sm">
                                    <div>
                                        <x-trix-input id="note" name="note"></x-trix-input>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-span-1 bg-white shadow-lg p-5 rounded-lg flex flex-col justify-between gap-5"
                        style="height: fit-content">
                        <div class="flex flex-col gap-2">
                            <h5 class="text-md font-medium">Status</h5>
                            <div class="flex items-center gap-3">
                                <div>
                                    <input type="radio" id="rejected" name="status" value="rejected"
                                           class="hidden peer" required/>
                                    <label for="rejected"
                                           class="cursor-pointer rounded-lg border border-primary bg-primary px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-complementary hover:bg-complementary flex gap-1 peer-[:checked]:bg-slate-700 peer-[:checked]:ring peer-[:checked]:ring-offset-1 peer-[:checked]:ring-secondary peer-[:checked]:ring-secondary peer-[:checked]:bg-complementary peer-[:checked]:border-complementary">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                             class="w-5 h-5 fill-white">
                                            <path
                                                d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path>
                                        </svg>
                                        Reject
                                    </label>
                                </div>
                                <div>
                                    <input type="radio" id="approved" name="status" value="approved"
                                           class="hidden peer" required/>
                                    <label for="approved"
                                           class="cursor-pointer rounded-lg border border-primary bg-primary px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-complementary hover:bg-complementary flex gap-1 peer-[:checked]:bg-slate-700 peer-[:checked]:ring peer-[:checked]:ring-offset-1 peer-[:checked]:ring-secondary peer-[:checked]:ring-secondary peer-[:checked]:bg-complementary peer-[:checked]:border-complementary">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                             class="w-5 h-5 fill-white">
                                            <path
                                                d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path>
                                        </svg>
                                        Approve
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button type="submit"
                                class="w-full bg-primary text-white px-5 py-2.5 rounded-lg cursor-pointer hover:bg-complementary">
                            Submit Review
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="w-full mt-5">
            <a href="{{ route('admin.submission.index') }}"
               class="mt-10 inline-flex items-center gap-1.5 rounded-lg border border-primary bg-primary px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all focus:ring focus:ring-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-white" viewBox="0 0 24 24">
                    <path
                        d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path>
                </svg>
                Back
            </a>
        </div>
    </x-dashboard-shell>
</x-app>
