<x-layout title="View Story">
    <div class="bg-white p-6 rounded shadow max-w-3xl mx-auto">
        <h2 class="text-2xl font-semibold mb-2">
            {{ $story->donationRequest->donationPost->clothingItem->name ?? 'Donated Item' }}
        </h2>
        <p class="text-gray-700 whitespace-pre-line">{{ $story->content }}</p>

        <div class="mt-6 flex gap-4">
            <a href="{{ route('stories.edit', $story) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
            <a href="{{ route('stories.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Back</a>
        </div>
    </div>
</x-layout>
