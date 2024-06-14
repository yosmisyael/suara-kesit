<div class="antialiased bg-white min-h-screen">
    <x-dashboard-navbar></x-dashboard-navbar>
    <x-dashboard-sidebar></x-dashboard-sidebar>
    <main class="p-4 md:ml-64 h-auto pt-20">
       {{ $slot }}
    </main>
</div>
