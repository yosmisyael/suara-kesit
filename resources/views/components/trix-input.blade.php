@props(['id', 'name', 'value' => ''])

<input
    type="hidden"
    name="{{ $name }}"
    id="{{ $id }}_input"
    value="{{ $value }}"
/>

<trix-toolbar
    class="[&_.trix-button]:bg-white [&_.trix-button.trix-active]:bg-gray-200! [&_.trix-button]:border-none! [&_.trix-button-group]:border-none! [&_.trix-button-group]:gap-1 [&_.trix-dialog--link]:rounded-none! [&_.trix-dialog--link]:text-base! [&_.trix-input--dialog]:border-t-0! [&_.trix-input--dialog]:border-l-0! [&_.trix-input--dialog]:border-r-0! [&_.trix-input--dialog]:border-b-2! [&_.trix-input--dialog]:rounded-none! sticky top-12 pt-6! bg-white"
    id="{{ $id }}_toolbar"
></trix-toolbar>

<trix-editor
    id="{{ $id }}"
    toolbar="{{ $id }}_toolbar"
    input="{{ $id }}_input"
    {{ $attributes->merge(['class' => 'trix-content !border-none !rounded-none !mt-4']) }}
    placeholder="Start writing here..."
></trix-editor>
