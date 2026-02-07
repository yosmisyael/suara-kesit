@php use App\Enums\PostStatus; @endphp
<div class="flex gap-12" x-data="{ isSlideMenuOpen: false }">
    <form wire:submit="save" class="flex-1 min-w-0 pr-6 transition-all duration-300">
        <div x-show="!isSlideMenuOpen"
             x-transition.opacity
             @click="isSlideMenuOpen = true"
             class="cursor-pointer hover:text-black flex items-center justify-end gap-1 font-medium text-gray-600">
            <span class="material-symbols-outlined rotate-180">right_panel_close</span>
            Post Information
        </div>
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
                        :disabled="!$wire.isEditMode"
                        type="button"
                        @click="open = !open"
                        class="w-full p-2 text-left mr-3 flex justify-between items-center focus:outline-none {{ $isEditMode ? 'cursor-pointer' : 'cursor-default' }}"
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

                {{-- Edit Button --}}
                @if(!$isEditMode)
                    <button
                        type="button"
                        class="btn-primary ml-auto"
                        wire:click.stop="$set('isEditMode', true)"
                    >
                        <span>Edit Post</span>
                    </button>
                @else
                    <div class="inline-flex gap-4">
                        {{-- Cancel Button --}}
                        <button
                            type="button"
                            class="btn btn-danger ml-auto"
                            wire:click="discard"
                        >
                            <span>Cancel</span>
                        </button>

                        {{-- Save Button --}}
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
                @endif
            </div>
        </div>

        {{-- Title --}}
        <div
            x-data="{
                limit: 255,
                resize() {
                    $refs.input.style.height = 'auto';
                    $refs.input.style.height = $refs.input.scrollHeight + 4 + 'px';
                },
            }"
            x-init="
            $nextTick(() => resize());
            $watch('$wire.title', () => {
                resize();
            })"
            class="relative mt-4"
        >
            <textarea
                wire:model.live.debounce.100ms="title"
                x-ref="input"
                wire:ignore
                @input="resize(); $wire.isDirty = true"
                id="title"
                rows="1"
                maxlength="255"
                class="w-full text-4xl font-bold bg-transparent border-none focus:ring-0 focus:outline-none resize-none overflow-hidden placeholder-gray-300 py-2 {{ $isEditMode ? 'cursor-text' : 'cursor-default' }}"
                placeholder="Title of the content"
                :readonly="!$wire.isEditMode"
            ></textarea>

            {{-- Title length indicator --}}
            <div
                class="absolute bottom-0 right-0 text-sm font-semibold transition-opacity duration-200"
                :class="$wire.title.length > 0 ? 'opacity-100' : 'opacity-0'"
            >
                <span
                    x-text="$wire.title.length"
                    :class="$wire.title.length >= limit ? 'text-red-500' : 'text-gray-600'"
                ></span>
                <span class="text-gray-300">/</span>
                <span class="text-gray-300" x-text="limit"></span>
            </div>

            @error('title') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        {{-- Content --}}
        <div wire:ignore
             :class="!$wire.isEditMode ? 'pointer-events-none [&_trix-toolbar]:hidden!' : ''"
             x-data="{
                content: $wire.entangle('content').live,
                syncTimer: null,
                getTrix() {
                    return $el.querySelector(`trix-editor[input='content_input']`);
                }
            }"

             {{-- Clear content on submit event --}}
             x-init="$watch('content', (value) => {
                const trix = getTrix();

                if (value === '' && trix.editor.getDocument().toString().trim()) {
                    trix.dataset.protectAttachments = 'true';
                    trix.editor.loadHTML('');
                }
            })"

            {{-- load content on refresh action and initialize attachment handler --}}
            x-on:trix-initialize="
                if (typeof window.App.initAttachmentManager === 'function') {
                    window.App.initAttachmentManager({
                        uploadUrl: `{{ route('attachment.store') }}`,
                        deleteUrl: `{{ route('attachment.destroy', ':id') }}`,
                        csrfToken: `{{ csrf_token() }}`,
                        postId: `{{ $post->id }}`,
                    });
                }
            "

             {{-- listen to trix value change and sync to livewire prop  --}}
             x-on:trix-change="
                if (document.activeElement === getTrix()) {
                    $wire.isDirty = true;
                    clearTimeout(syncTimer);
                    syncTimer = setTimeout(() => content = $event.target.value, 500);
                }
            "

            {{-- revert to original content after discard action --}}
             x-on:post-content-reset.window="
                const trix = getTrix();
                trix.dataset.protectAttachments = 'true';
                trix.editor.loadHTML($event.detail.content);
            "
        >
            <x-trix-input
                id="content"
                name="content"
                value="{!! $post->postBody->content !!}"
            />
        </div>
        @error('content') <p class="form-error">{{ $message }}</p> @enderror
    </form>

    <section
        class="border-l border-gray-100 transition-all duration-500 ease-in-out overflow-hidden"
        :class="isSlideMenuOpen ? 'w-80 opacity-100 ml-6' : 'w-0 opacity-0 ml-0'"
    >
        <div class="inline-flex justify-between items-center w-full select-none">
            <h2 class="text-2xl font-semibold">Post Information</h2>
            <span @click="isSlideMenuOpen = false"
                  class="cursor-pointer text-gray-600 hover:text-black block material-symbols-outlined mt-1.25">right_panel_close</span>
        </div>
        <p class="mt-8 font-medium">Created on</p>
        <p class="mt-2 italic font-medium">{{ $post->created_at->format('M d, Y') }}</p>
        <h3 class="mt-8 text-xl font-medium">Editorial</h3>
        <p class="mt-2 font-medium">Status</p>
        <p class="mt-2">
            <span @class([
                    'badge',
                    'success' => $post->status === PostStatus::PUBLISHED,
                    'warning' => $post->status === PostStatus::PENDING,
                    'default' => $post->status === PostStatus::DRAFT
                        || $post->status === PostStatus::REJECTED,
                    'danger' => $post->status === PostStatus::REVOKED,
                    ])
            >
                {{ ucfirst($post->status->value) }}
            </span>
        </p>
        <p class="mt-6 font-medium">Editorial History</p>
        <p class="mt-2 italic font-medium text-gray-600">Doesn't have historical review yet.</p>
        <h3 class="mt-8 text-xl font-medium">Post Performance</h3>
        <p class="mt-2 italic font-medium text-gray-600">Publish post to get analysis.</p>
    </section>
</div>

