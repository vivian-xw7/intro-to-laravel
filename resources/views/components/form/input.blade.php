@props(['name', 'type' => 'text'])

<x-form.field>
    <x-form.label name="{{ $name }}" />

    <input class="border border-gray-400 p-2 w-full" 
        type="{{ $type }}" 
        name="{{ $name }}" 
        value="{{ old($name) }}"
        id="{{ $name }}" 
        required
    >

    <x-form.error name="{{ $name }}" />
</x-form.field>



