<x-layout title="Edit Clothing Item">
    <h1 class="text-2xl font-bold mb-4">Edit Clothing Item</h1>

    <form method="POST" action="{{ route('clothing-items.update', $clothingItem) }}" enctype="multipart/form-data" class="space-y-4 max-w-xl bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <x-input label="Category" name="category" value="{{ $clothingItem->category }}" required />
        <x-input label="Color" name="color" value="{{ $clothingItem->color }}" />
        <x-input label="Size" name="size" value="{{ $clothingItem->size }}" />
        <x-input label="Brand" name="brand" value="{{ $clothingItem->brand }}" />
        <x-input label="Condition" name="condition" value="{{ $clothingItem->condition }}" />
        <x-input label="Image" name="image" type="file" />

        @if ($clothingItem->image)
            <img src="{{ asset('storage/' . $clothingItem->image) }}" class="w-32 h-32 object-cover rounded" />
        @endif

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Item</button>
    </form>
</x-layout>
