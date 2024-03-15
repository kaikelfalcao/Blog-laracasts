@props(['name', 'placeholder' => ''])

<x-form.field>
    <x-form.label name="{{ $name }}"/>

    <textarea
        name="{{ $name }}"
        id="{{ $name }}"
        placeholder="{{ $placeholder }}"
        required
        class="border border-gray-200 p-2 w-full rounded"
        >{{ $slot ?? old($name) }}</textarea>

    <x-form.error name="{{ $name }}" />
</x-form.field>
