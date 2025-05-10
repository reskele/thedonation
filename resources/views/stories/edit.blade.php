<x-layout title="Edit Story">
    <h1 class="text-2xl font-bold mb-4">Edit Your Story</h1>

    <form action="{{ route('stories.update', $story) }}" method="POST" class="bg-white p-6 rounded shadow max-w-xl space-y-4">
        @csrf
        @method('PUT')

        <x-textarea name="story" label="Your Story" rows="6" :value="$story->story" required />

        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
            Update
        </button>
    </form>
</x-layout>
