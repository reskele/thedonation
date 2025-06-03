<x-layout title="Share Your Story">
    <h1 class="text-2xl font-bold mb-4">Submit a Thank You Story</h1>

    <form action="{{ route('stories.store') }}" method="POST" class="bg-white p-6 rounded shadow max-w-xl space-y-4">
        @csrf

        <div>
            <label for="donation_request_id" class="block font-medium">Select Donation</label>
            <select name="donation_request_id" id="donation_request_id" class="w-full mt-1 rounded border-gray-300">
                @foreach ($donationRequests as $request)
                    <option value="{{ $request->id }}">
                        {{ $request->donationPost->clothingItem->name ?? 'Item' }}
                    </option>
                @endforeach
            </select>
            @error('donation_request_id')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <x-textarea name="content" label="Your Story" rows="6" required />

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Submit
        </button>
    </form>
</x-layout>
