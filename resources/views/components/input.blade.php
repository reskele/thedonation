@props(['label', 'name', 'type' => 'text', 'value' => ''])

<div>
    <label for="{{ $name }}" class="block font-medium mb-1">{{ $label }}</label>
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value) }}"
        class="w-full border-2 border-gray-400 px-4 py-1 rounded shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
    >
    @error($name)
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
    @enderror
</div>
