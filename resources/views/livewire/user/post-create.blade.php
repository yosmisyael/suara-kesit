<div>
    <form wire:submit="save">
        {{-- Toolbar --}}
        <div class="sticky top-0 z-10 pt-4 bg-white">
            <div class="flex items-center justify-between">
                {{-- Category Dropdown --}}
                <div
                    x-data="{
                        open: false,
                        selectedId: $wire.entangle('categoryId').live,
                        selectedName: 'Choose post category',
                        categories: {{ $categories->toJson() }},

                        updateUIFromId(id) {
                            const category = this.categories.find(category => category.id == id);
                            if (category) {
                                this.selectedId = category.id;
                                this.selectedName = category.name;
                                $wire.categoryId = this.selectedId;
                                $wire.isDirty = true;
                            } else {
                                this.selectedName = 'Choose post category';
                            }
                            this.open = false;
                        }
                    }"
                    x-init="
                        updateUIFromId(selectedId);

                        $watch('selectedId', value => {
                            updateUIFromId(value);
                            // if (value && window.App.draftManager) {
                            //     window.App.draftManager.onCategoryChange(value);
                            // }
                        });
                    "
                    {{-- @draft-category-restored.window="updateUIFromId($event.detail.categoryId)" --}}
                    class="relative w-fit"
                    @click.outside="open = false"
                >
                    <input type="hidden" id="category" x-model="selectedId">

                    <button
                        type="button"
                        @click="open = !open"
                        class="w-full p-2 text-left mr-3 flex justify-between items-center  cursor-pointer focus:outline-none"
                    >
                        <span x-text="selectedName"></span>

                        {{-- dropdown icon --}}
                        <svg class="w-4 h-4 transition-transform" :class="open ? 'rotate-180' : ''" fill="none"
                             stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <div
                        x-show="open"
                        x-transition
                        class="absolute z-50 w-full mt-1 bg-white shadow-lg max-h-60 overflow-auto"
                        style="display: none;"
                    >
                        <ul>
                            <template x-for="category in categories" :key="category.id">
                                <li
                                    @click="updateUIFromId(category.id)"
                                    class="p-2 cursor-pointer transition-colors"
                                    :class="{
                                            'bg-black text-white': selectedId === category.id,
                                            'hover:bg-gray-200': selectedId !== category.id
                                        }"
                                >
                                    <span x-text="category.name"></span>
                                </li>
                            </template>
                        </ul>
                    </div>
                </div>
                @error('categoryId') <p class="form-error">{{ $message }}</p> @enderror

                {{-- Save Button --}}
                <button
                    type="submit"
                    class="btn-primary ml-auto"
                    :class="{ 'disabled': !$wire.isDirty }"
                    :disabled="!$wire.isDirty"
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
                title: $wire.entangle('title').live,
                limit: 255,
                resize() {
                    $refs.input.style.height = 'auto';
                    $refs.input.style.height = $refs.input.scrollHeight + 4 + 'px';
                },
            }"
            x-init="$watch('title', () => resize())"
            class="relative mt-4"
        >
            <textarea
                x-ref="input"
                x-model="title"
                @input="resize(); $wire.isDirty = true"
                id="title"
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
        <div wire:ignore
            x-data="{
                content: $wire.entangle('content').live,
                getTrix() {
                    return $el.querySelector(`trix-editor[input='content_input']`);
                }
            }"
            {{-- Clear content on submit event --}}
            x-init="$watch('content', (value) => {
                const trix = getTrix();

                if (!value && trix.editor.getDocument().toString().trim()) {
                    trix.dataset.protectAttachments = true;
                    trix.editor.loadHTML('');
                }
            })"
            {{-- load content on refresh action and initialize attachment handler --}}
            x-on:trix-initialize="
                $event.target.editor.loadHTML(content);
                if (typeof window.App.initAttachmentManager === 'function') {
                    window.App.initAttachmentManager({
                        uploadUrl: `{{ route('attachment.store') }}`,
                        deleteUrl: `{{ route('attachment.destroy', ':id') }}`,
                        csrfToken: `{{ csrf_token() }}`,
                        batchId: `{{ $draftId }}`,
                    });
                }
            "

            {{-- listen to trix value change and sync to livewire prop  --}}
            x-on:trix-change="
                content = $event.target.value;
                if (document.activeElement === getTrix()) $wire.isDirty = true;
            "
        >
            <x-trix-input
                id="content"
                name="content"
                :value="$content"
            />
        </div>
        @error('content') <p class="form-error">{{ $message }}</p> @enderror
    </form>
</div>

@push('scripts')
    <script type="module">
        document.addEventListener('DOMContentLoaded', function () {
            {{--let livewire = @this;--}}

            if (typeof window.App.initAttachmentManager === 'function') {
                {{--window.App.initEditor({--}}
                {{--    livewireComponent: livewire,--}}
                {{--    hydrationMethod: 'onStateChanges',--}}
                {{--    titleInputId: 'title',--}}
                {{--    categoryInputId: 'category',--}}
                {{--    contentInputId: 'content',--}}
                {{--});--}}
            } else {
                window.App.utils.showToast(
                    'Failed to initialize editor, please try reloading the page.',
                    'error'
                );
            }
        });
    </script>
@endpush
