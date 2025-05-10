<x-layout title="My Outfit Plans">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Outfit Plans</h1>
        <a href="{{ route('outfit-plans.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + New Plan
        </a>
    </div>

    @if ($outfitPlans->isEmpty())
        <p class="text-gray-600">You haven’t created any outfit plans yet.</p>
    @else
        <div class="grid gap-4">
            @foreach ($outfitPlans as $plan)
                <div class="bg-white p-4 rounded shadow">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-xl font-semibold">{{ $plan->note }}</h2>
                            <p class="text-gray-500 text-sm">{{ \Carbon\Carbon::parse($plan->date)->toFormattedDateString() }}</p>
                            <p class="mt-2 text-sm text-gray-700">Items:
                                @foreach ($plan->clothingItems as $item)
                                    <span class="inline-block bg-gray-100 px-2 py-1 rounded text-sm">{{ $item->name }}</span>
                                @endforeach
                            </p>
                        </div>
                        <div class="flex gap-3">
                            <a href="{{ route('outfit-plans.show', $plan) }}" class="text-blue-600 hover:underline">View</a>
                            <a href="{{ route('outfit-plans.edit', $plan) }}" class="text-yellow-600 hover:underline">Edit</a>
                            <form action="{{ route('outfit-plans.destroy', $plan) }}" method="POST" onsubmit="return confirm('Delete this plan?');">
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
            {{ $outfitPlans->links() }}
        </div>
    @endif
</x-layout>
