<div
    x-data="{
        show: false,
        message: '',
        type: 'success',
        timeout: null
    }"

    x-on:notify.window="
        show = true;
        message = $event.detail.message;
        type = $event.detail.type || 'success';

        // Clear existing timeout if multiple toasts fire quickly
        if (timeout) clearTimeout(timeout);

        timeout = setTimeout(() => { show = false }, 4000);
    "
    x-show="show"
    x-transition.duration.300ms
    class="fixed bottom-5 right-5 z-50 flex items-center w-full max-w-md p-4 space-x-3 text-gray-500 bg-white rounded-lg shadow-lg border border-gray-200"
    role="alert"
    style="display: none;" {{-- Prevents flicker on load --}}
>
    {{-- Icon --}}
    <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 rounded-lg"
         :class="{
           'text-green-600 bg-green-100' : type === 'success',
           'text-red-600 bg-red-100' : type === 'error',
           'text-yellow-600 bg-yellow-100' : type === 'warning',
           'text-blue-600 bg-blue-100' : type === 'info',
         }"
    >

        {{-- Success Icon --}}
        <svg x-show="type === 'success'" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
        </svg>

        {{-- Error Icon --}}
        <svg x-show="type === 'error'" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>

        {{-- Info Icon --}}
        <svg x-show="type === 'info'" xmlns="http://www.w3.org/2000/svg"  class="w-5 h-5" viewBox="0 -960 960 960" fill="currentColor"><path d="M480-680q-33 0-56.5-23.5T400-760q0-33 23.5-56.5T480-840q33 0 56.5 23.5T560-760q0 33-23.5 56.5T480-680Zm-60 560v-480h120v480H420Z"/></svg>

        {{-- Info Icon --}}
        <svg x-show="type === 'warning'" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 -960 960 960" fill="currentColor"><path d="m40-120 440-760 440 760H40Zm138-80h604L480-720 178-200Zm302-40q17 0 28.5-11.5T520-280q0-17-11.5-28.5T480-320q-17 0-28.5 11.5T440-280q0 17 11.5 28.5T480-240Zm-40-120h80v-200h-80v200Zm40-100Z"/></svg>
    </div>

    {{-- Message --}}
    <div class="ml-3 text-base font-semibold" x-text="message"></div>

    {{-- Close Button --}}
    <button @click="show = false" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 cursor-pointer">
        <span class="sr-only">Close</span>
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
    </button>
</div>
