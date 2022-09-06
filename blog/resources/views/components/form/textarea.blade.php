@props(['name', 'placeholder' => ""])

<x-form.field>
    <x-form.label name="{{ $name }}" />

    <textarea class="border border-gray-400 p-2 w-full"
              name="excerpt"
              id="{{ $name }}"
              required
    >{{ old($name) }}</textarea>

    <x-form.error name="{{ $name }}" />
</x-form.field>
