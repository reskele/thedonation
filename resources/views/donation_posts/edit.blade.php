<x-layout title="Edit Donation Post">
    <h1 class="text-2xl font-bold mb-4">Edit Donation Post</h1>

    <form method="POST" action="{{ route('donation-posts.update', $donationPost) }}" class="bg-white p-6 rounded shadow max-w-xl space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium mb-1">Clothing Item</label>
            <select name="clothing_item_id" class="w-full border-gray-300 rounded shadow-sm">
                @foreach ($clothingItems as $item)
                    <option value="{{ $item->id }}" {{ $donationPost->clothing_item_id == $item->id ? 'selected' : '' }}>
                        {{ $item->name }} ({{ $item->size }}, {{ $item->gender }})
                    </option>
                @endforeach
            </select>
            @error('clothing_item_id')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="block font-medium mb-1">Status</label>
            <select name="status" class="w-full border-gray-300 rounded shadow-sm">
                @foreach (['available', 'pending', 'donated'] as $status)
                    <option value="{{ $status }}" {{ $donationPost->status === $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
            @error('status')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Post</button>
    </form>
</x-layout>
