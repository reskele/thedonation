<x-layout title="My Donation Requests">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Donation Requests</h1>
        <a href="{{ route('donation-requests.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Request Item
        </a>
    </div>

    @if ($donationRequests->isEmpty())
        <p class="text-gray-600">You haven’t requested any items yet.</p>
    @else
        <div class="grid gap-4">
            @foreach ($donationRequests as $request)
                <div class="bg-white p-4 rounded shadow">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-xl font-semibold">{{ $request->donationPost->clothingItem->name }}</h2>
                            <p class="text-sm text-gray-500">Requested: {{ $request->requested_at }}</p>
                            <p class="text-sm text-gray-600">Status:
                                <span class="font-medium capitalize {{ 
                                    $request->status === 'pending' ? 'text-yellow-600' : 
                                    ($request->status === 'approved' ? 'text-green-600' : 'text-red-600') }}">
                                    {{ $request->status }}
                                </span>
                            </p>
                        </div>
                        <div class="flex gap-3 items-center">
                            <a href="{{ route('donation-requests.show', $request) }}" class="text-blue-600 hover:underline">View</a>
                            @if ($request->status === 'pending')
                                <form action="{{ route('donation-requests.destroy', $request) }}" method="POST" onsubmit="return confirm('Delete this request?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $donationRequests->links() }}
        </div>
    @endif
</x-layout>
