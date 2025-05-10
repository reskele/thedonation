<x-layout title="My Clothing Items">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">My Clothing Items</h1>
        <a href="{{ route('clothing-items.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Add Item
        </a>
    </div>

    @if ($clothingItems->isEmpty())
        <p class="text-gray-600">You haven’t added any clothing items yet.</p>
    @else
        <div class="grid gap-4">
            @foreach ($clothingItems as $item)
                <div class="bg-white p-4 rounded shadow flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" class="w-20 h-20 object-cover rounded">
                        @else
                            <div class="w-20 h-20 bg-gray-200 rounded flex items-center justify-center text-gray-500">No Image</div>
                        @endif
                        <div>
                            <h2 class="text-lg font-semibold">{{ $item->category }}</h2>
                            <p class="text-sm text-gray-500">{{ $item->size }} | {{ $item->color }} | {{ $item->condition }}</p>
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

        <div class="mt-6">
            {{ $clothingItems->links() }}
        </div>
    @endif
</x-layout>
