<x-layout title="Request a Donation">
    <h1 class="text-2xl font-bold mb-4">Request a Donation Item</h1>

    @if ($availablePosts->isEmpty())
        <p class="text-gray-600">There are no available items to request at the moment.</p>
    @else
        <form method="POST" action="{{ route('donation-requests.store') }}" class="bg-white p-6 rounded shadow max-w-xl space-y-4">
            @csrf

            <div>
                <label class="block font-medium mb-1">Choose an Item</label>
                <select name="donation_post_id" class="w-full border-gray-300 rounded shadow-sm">
                    <option value="">-- Select Item --</option>
                    @foreach ($availablePosts as $post)
                        <option value="{{ $post->id }}" {{ old('donation_post_id') == $post->id ? 'selected' : '' }}>
                            {{ $post->clothingItem->name }} ({{ $post->clothingItem->size }}, {{ $post->clothingItem->gender }})
                        </option>
                    @endforeach
                </select>
                @error('donation_post_id')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Submit Request</button>
        </form>
    @endif
</x-layout>
