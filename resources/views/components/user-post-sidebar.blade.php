@php
    $activeClasses = 'inline-flex items-center gap-3 font-bold text-black';
    $inactiveClasses = 'inline-flex items-center gap-3';
@endphp

<ul class="font-semibold text-gray-600 text-lg flex flex-col gap-12">
    <li>
        <a href="{{ route('user.post') }}"
           class="{{ request()->routeIs('user.post') ? $activeClasses : $inactiveClasses }}"
           wire:navigate.hover
        >
            <span class="material-symbols-outlined">home</span>
            Overview
        </a>
    </li>
    <li>
        <a href="{{ route('user.post.create') }}"
           class="{{ request()->routeIs('user.post.create') ? $activeClasses : $inactiveClasses }}"
           wire:navigate
        >
            <span class="material-symbols-outlined mt-1">add_circle</span>
            Write Post
        </a>
    </li>
    <li>
        <a href="{{ route('user.post.list') }}"
           class="{{ request()->routeIs('user.post.list') ? $activeClasses : $inactiveClasses }}"
           wire:navigate
        >
            <span class="material-symbols-outlined mt-1">list</span>
            Post List
        </a>
    </li>
</ul>
