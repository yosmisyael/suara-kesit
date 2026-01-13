@props(['route', 'active' => false])

@php
    $isActive = $active || request()->routeIs($route) || request()->routeIs($route . '*');

    $classes = $isActive
        ? 'block py-5 px-5 border-b-[3px] border-black text-black font-bold'
        : 'block py-5 px-5 text-gray-600 hover:text-black transition-colors';
@endphp

<li>
    <a href="{{ route($route) }}" {{ $attributes->merge(['class' => $classes]) }} wire:navigate.hover>
        {{ $slot }}
    </a>
</li>
