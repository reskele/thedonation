<x-layout title="Clothing Item Details">
    <div class="max-w-2xl bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-2">{{ $clothingItem->category }}</h2>

        @if ($clothingItem->image)
            <img src="{{ asset('storage/' . $clothingItem->image) }}" class="w-full max-h-80 object-cover rounded mb-4">
        @endif

        <p><strong>Color:</strong> {{ $clothingItem->color }}</p>
        <p><strong>Size:</strong> {{ $clothingItem->size }}</p>
        <p><strong>Brand:</strong> {{ $clothingItem->brand }}</p>
        <p><strong>Condition:</strong> {{ $clothingItem->condition }}</p>

        <div class="mt-6 flex gap-4">
            <a href="{{ route('clothing-items.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Back</a>
            <a href="{{ route('clothing-items.edit', $clothingItem) }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Edit</a>
        </div>
    </div>
</x-layout>
