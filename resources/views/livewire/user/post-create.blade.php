<div>
    <form wire:submit="save">
        {{-- Toolbar --}}
        <div class="sticky top-0 z-10 pt-4 bg-white">
            <div class="flex items-center justify-between">
                <div class="flex gap-4 items-center">
                    {{-- Shows when draft is restored --}}
                    {{--                    <span id="draft-indicator" class="hidden badge items-center bg-gray-100 text-sm">--}}
                    {{--                        <button type="button" id="discard-draft"></button>--}}
                    {{--                    </span>--}}

                    {{-- Shows save status --}}
                    {{--                    <span id="auto-save-indicator" class="hidden text-sm text-gray-500">--}}
                    {{--                        <span id="save-status" class="inline-flex items-center gap-1">--}}
                    {{--                            <span class="material-symbols-outlined text-[18px]!">check</span>--}}
                    {{--                            Temporary Saved--}}
                    {{--                        </span>--}}
                    {{--                    </span>--}}
                </div>
                <button
                    type="submit"
                    class="btn-primary ml-auto"
                    :class="{ 'disabled': !$wire.isDirty }"
                    :disabled="!$wire.isDirty"
                    wire:click="save"
                    wire:loading.attr="disabled"
                    wire:target="save"
                >
                    <span
                        wire:loading.remove
                        wire:target="save"
                        x-text="$wire.isDirty ? 'Save' : 'Saved' "
                    >
                    </span>

                    <span wire:loading wire:target="save">
                        Saving...
                    </span>
                </button>
            </div>
        </div>

        {{-- Title --}}
        <div
            x-data="{
                title: $wire.entangle('title'),
                limit: 255,
                resize() {
                    $refs.input.style.height = 'auto';
                    $refs.input.style.height = $refs.input.scrollHeight + 4 + 'px';
                },
            }"
            x-init="$watch('title', () => resize()); resize();"
            class="relative mt-4"
        >
            <textarea
                x-ref="input"
                x-model="title"
                @input="resize(); $wire.isDirty = true"
                id="post-title"
                rows="1"
                maxlength="255"
                class="w-full text-4xl font-bold bg-transparent border-none focus:ring-0 focus:outline-none resize-none overflow-hidden placeholder-gray-300 py-2"
                placeholder="Title of the content"
            ></textarea>

            {{-- Title length indicator --}}
            <div
                class="absolute bottom-0 right-0 text-sm font-semibold transition-opacity duration-200"
                :class="title.length > 0 ? 'opacity-100' : 'opacity-0'"
            >
                <span
                    x-text="title.length"
                    :class="title.length >= limit ? 'text-red-500' : 'text-gray-600'"
                ></span>
                <span class="text-gray-300">/</span>
                <span class="text-gray-300" x-text="limit"></span>
            </div>

            @error('title') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        {{-- Content --}}
        <div wire:ignore>
            <x-trix-input
                id="canvas"
                name="content"
                :value="$content"
            />
        </div>
        @error('content')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </form>
</div>

@push('scripts')
    <script type="module">
        document.addEventListener('DOMContentLoaded', function () {
            const livewire = @this;

            if (typeof window.App.initEditor === 'function') {
                window.App.initEditor({
                    trixElementId: "canvas",
                    uploadUrl: "{{ route('attachment.store') }}",
                    deleteUrl: "{{ route('attachment.destroy', ':id') }}",
                    csrfToken: "{{ csrf_token() }}",
                    batchId: "{{ $batchId }}",
                    livewireComponent: livewire,
                    syncingMethodName: 'onStateChanges'
                });
            } else {
                window.App.utils.showToast(
                    'Auto-restore feature failed. Please enable JavaScript.',
                    'error'
                );
            }
        });
    </script>
@endpush
