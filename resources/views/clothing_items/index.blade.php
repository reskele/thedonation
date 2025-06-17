<x-layout title="My Clothing Items">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">My Clothing Items</h1>
        <a href="{{ route('clothing-items.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Add Item
        </a>
    </div>

    <!-- Category Navigation -->
    <div class="mb-6 flex gap-2">
        @foreach($categories as $category)
            <a href="{{ route('clothing-items.index', ['category' => $category]) }}"
               class="px-4 py-2 rounded {{ $selectedCategory === $category ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }}">
                {{ ucfirst($category) }}
            </a>
        @endforeach
    </div>

    <h2 class="text-xl font-bold mt-6 mb-2">{{ ucfirst($selectedCategory) }}</h2>

    @if ($clothingItems->isEmpty())
        <p class="text-gray-600">No items in this category yet.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($clothingItems as $item)
                <div class="bg-white p-4 rounded shadow flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        @if($item && is_object($item) && $item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" class="w-20 h-20 object-cover rounded">
                        @else
                            <div class="w-20 h-20 bg-gray-200 rounded flex items-center justify-center text-gray-500">No Image</div>
                        @endif
                        <div>
                            <div class="font-semibold">{{ $item->name ?? 'No name' }}</div>
                            <div>Size: {{ $item->size ?? 'N/A' }}</div>
                            <div>Color: {{ $item->color ?? 'N/A' }}</div>
                            <p class="text-sm text-gray-500">{{ $item->condition ?? 'N/A' }}</p>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <a href="{{ route('clothing-items.show', $item) }}" class="text-blue-600 hover:underline">View</a>
                        <a href="{{ route('clothing-items.edit', $item) }}" class="text-indigo-600 hover:underline">Edit</a>
                        <form action="{{ route('clothing-items.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this item?');">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</x-layout>
