@props(['title' => 'Dashboard', 'user'])

<x-layouts.user :title="$title" :user="$user">
    <div class="wrapper flex h-screen">
        {{-- Post Menu Sidebar --}}
        <aside class="border-r border-gray-400 px-12 w-64 py-6">
            <x-user-post-sidebar />
        </aside>

        {{-- Post Content --}}
        <section class="flex-1 pl-8">
            {{ $slot }}
        </section>
    </div>
</x-layouts.user>
