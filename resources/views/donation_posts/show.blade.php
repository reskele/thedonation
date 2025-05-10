<x-layout title="Donation Post Details">
    <div class="bg-white p-6 rounded shadow max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold mb-2">{{ $donationPost->clothingItem->name }}</h2>

        <p class="text-gray-600">Status: <span class="capitalize font-medium">{{ $donationPost->status }}</span></p>
        <p><strong>Size:</strong> {{ $donationPost->clothingItem->size }}</p>
        <p><strong>Gender:</strong> {{ $donationPost->clothingItem->gender }}</p>
        <p><strong>Description:</strong> {{ $donationPost->clothingItem->description }}</p>

        <div class="mt-6 flex gap-4">
            <a href="{{ route('donation-posts.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Back</a>
            <a href="{{ route('donation-posts.edit', $donationPost) }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Edit</a>
        </div>
    </div>
</x-layout>
