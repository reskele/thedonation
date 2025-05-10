<x-layout title="Request Details">
    <div class="bg-white p-6 rounded shadow max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold mb-2">{{ $donationRequest->donationPost->clothingItem->name }}</h2>
        <p class="text-gray-600">Requested on: {{ $donationRequest->requested_at->toDayDateTimeString() }}</p>

        <div class="mt-4">
            <p><strong>Status:</strong> <span class="capitalize">{{ $donationRequest->status }}</span></p>
            <p><strong>Size:</strong> {{ $donationRequest->donationPost->clothingItem->size }}</p>
            <p><strong>Gender:</strong> {{ $donationRequest->donationPost->clothingItem->gender }}</p>
            <p><strong>Description:</strong> {{ $donationRequest->donationPost->clothingItem->description }}</p>
        </div>

        <div class="mt-6 flex gap-4">
            <a href="{{ route('donation-requests.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Back</a>
            @if ($donationRequest->status === 'pending')
                <form action="{{ route('donation-requests.destroy', $donationRequest) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this request?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Delete</button>
                </form>
            @endif
        </div>
    </div>
</x-layout>
