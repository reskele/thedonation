@props(['name', 'label', 'rows' => 4, 'value' => '', 'required' => false])

<div>
    <label for="{{ $name }}" class="block font-medium mb-1">{{ $label }}</label>
    <textarea
        name="{{ $name }}"
        id="{{ $name }}"
        rows="{{ $rows }}"
        class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500"
        {{ $required ? 'required' : '' }}
    >{{ old($name, $value) }}</textarea>
    @error($name)
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
    @enderror
</div>
