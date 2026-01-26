@php
    $errorTitle = 'Forbidden';
    $errorMessage = $exception->getMessage() ?: "You don't have permission to view or edit this resource.";
@endphp

@auth
    @php
        $user = auth()->user();
    @endphp
    <x-layouts.user-with-sidebar :title="$errorTitle" :user="$user">
        <section class="py-40 flex flex-col items-center gap-10">
            <h1 class="text-center text-4xl font-bold">{{ $errorMessage }}</h1>
            <a href="{{ url()->previous() }}" class="btn-primary w-fit">Back to previous page</a>
        </section>
    </x-layouts.user-with-sidebar>
@else
    <x-layouts.public title="{{ $errorTitle }}">
        <section class="py-40 flex flex-col items-center gap-10">
            <h1 class="text-center text-4xl font-bold">{{ $errorMessage }}</h1>
            <a href="{{ url()->previous() }}" class="btn-primary w-fit">Back to previous page</a>
        </section>
    </x-layouts.public>
@endauth
