@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
        {{-- Mobile View --}}
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <span
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                    Previous
                </span>
            @else
                <button wire:click="previousPage" wire:loading.attr="disabled"
                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    Previous
                </button>
            @endif

            @if ($paginator->hasMorePages())
                <button wire:click="nextPage" wire:loading.attr="disabled"
                        class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    Next
                </button>
            @else
                <span
                    class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                    Next
                </span>
            @endif
        </div>

        {{-- Desktop View --}}
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <p class="text-sm font-medium text-black leading-5">
                Showing
                <span class="font-medium">{{ $paginator->firstItem() }}</span>
                to
                <span class="font-medium">{{ $paginator->lastItem() }}</span>
                of
                <span class="font-medium">{{ $paginator->total() }}</span>
                results
            </p>

            <div>
                <span class="flex font-medium">
                    {{-- Previous Page Link --}}
                    <button wire:click="{{ !$paginator->onFirstPage() ? 'previousPage' : ''}}"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium focus:outline-0 {{ !$paginator->onFirstPage() ? 'text-black cursor-pointer' : 'text-gray-500 cursor-not-allowed' }}"
                    >
                            <span class="material-symbols-outlined text-sm">chevron_left</span>
                    </button>

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                            <span
                                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span class="block px-4 py-2 cursor-pointer bg-black text-white">{{$page}}</span>
                                @else
                                    <button wire:click="gotoPage({{ $page }})"
                                            class="px-4 py-2 cursor-pointer">
                                    {{ $page }}
                                </button>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    <button wire:click="{{ $paginator->hasMorePages() ? 'nextPage' : ''}}"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium focus:outline-0 {{ $paginator->hasMorePages() ? 'text-black cursor-pointer' : 'text-gray-500 cursor-not-allowed' }}"
                    >
                            <span class="material-symbols-outlined text-sm">chevron_right</span>
                    </button>
                </span>
            </div>
        </div>
    </nav>
@endif
