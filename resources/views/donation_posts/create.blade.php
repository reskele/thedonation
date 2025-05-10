<x-layout title="Create Donation Post">
    <h1 class="text-2xl font-bold mb-4">Create a New Donation Post</h1>

    @if ($clothingItems->isEmpty())
        <p class="text-gray-600">You have no clothing items available to post.</p>
    @else
        <form method="POST" action="{{ route('donation-posts.store') }}" class="bg-white p-6 rounded shadow max-w-xl space-y-4">
            @csrf

            <div>
                <label class="block font-medium mb-1">Select Clothing Item</label>
                <select name="clothing_item_id" class="w-full border-gray-300 rounded shadow-sm">
                    <option value="">-- Choose an item --</option>
                    @foreach ($clothingItems as $item)
                        <option value="{{ $item->id }}" {{ old('clothing_item_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->name }} ({{ $item->size }}, {{ $item->gender }})
                        </option>
                    @endforeach
                </select>
                @error('clothing_item_id')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Create Post</button>
        </form>
    @endif
</x-layout>
