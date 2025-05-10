<x-layout title="My Stories">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">My Donation Stories</h1>
        <a href="{{ route('stories.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Share a Story
        </a>
    </div>

    @if ($stories->isEmpty())
        <p class="text-gray-600">No stories submitted yet.</p>
    @else
        <div class="space-y-4">
            @foreach ($stories as $story)
                <div class="bg-white p-4 shadow rounded">
                    <h2 class="font-semibold text-lg">
                        {{ $story->donationRequest->donationPost->clothingItem->name ?? 'Item' }}
                    </h2>
                    <p class="mt-2 text-gray-700">{{ Str::limit($story->story, 150) }}</p>
                    <div class="mt-4 flex gap-3">
                        <a href="{{ route('stories.show', $story) }}" class="text-blue-500 hover:underline">View</a>
                        <a href="{{ route('stories.edit', $story) }}" class="text-yellow-500 hover:underline">Edit</a>
                        <form action="{{ route('stories.destroy', $story) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 hover:underline" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach

            <div class="mt-6">
                {{ $stories->links() }}
            </div>
        </div>
    @endif
</x-layout>
