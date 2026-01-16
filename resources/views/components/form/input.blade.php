@props(['label' => 'Label', 'name' => 'title', 'placeholder' => 'default placeholder'])

<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="{{ $name }}">
        {{ $label }}
    </label>
    <input
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        id="{{ $name }}"
        type="text"
        placeholder="{{ $placeholder }}"
        name="{{ $name }}"
        :value="old()">
    <x-auth.error :field="$name"/>
</div>


