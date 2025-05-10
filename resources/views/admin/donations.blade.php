<x-layout title="My Donation Posts">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Donation Posts</h1>
        <a href="{{ route('donation-posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + New Post
        </a>
    </div>

    @if ($donationPosts->isEmpty())
        <p class="text-gray-600">You haven’t posted any donation items yet.</p>
    @else
        <div class="grid gap-4">
            @foreach ($donationPosts as $post)
                <div class="bg-white p-4 rounded shadow">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-lg font-semibold">{{ $post->clothingItem->name }}</h2>
                            <p class="text-sm text-gray-500">Status:
                                <span class="capitalize {{ 
                                    $post->status === 'available' ? 'text-green-600' : 
                                    ($post->status === 'pending' ? 'text-yellow-600' : 'text-gray-600') }}">
                                    {{ $post->status }}
                                </span>
                            </p>
                        </div>
                        <div class="flex gap-3">
                            <a href="{{ route('donation-posts.show', $post) }}" class="text-blue-600 hover:underline">View</a>
                            <a href="{{ route('donation-posts.edit', $post) }}" class="text-indigo-600 hover:underline">Edit</a>
                            <form action="{{ route('donation-posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $donationPosts->links() }}
        </div>
    @endif
</x-layout>
