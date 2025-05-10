<x-layout title="Outfit Plan Details">
    <div class="bg-white p-6 rounded shadow max-w-3xl mx-auto">
        <h2 class="text-2xl font-bold">{{ $outfitPlan->note }}</h2>
        <p class="text-gray-600">{{ \Carbon\Carbon::parse($outfitPlan->date)->toFormattedDateString() }}</p>

        <div class="mt-4">
            <h3 class="font-semibold">Clothing Items</h3>
            <ul class="list-disc list-inside text-gray-700 mt-2">
                @foreach ($outfitPlan->clothingItems as $item)
                    <li>{{ $item->name }}</li>
                @endforeach
            </ul>
        </div>

        <div class="mt-6 flex gap-4">
            <a href="{{ route('outfit-plans.edit', $outfitPlan) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
            <a href="{{ route('outfit-plans.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Back</a>
        </div>
    </div>
</x-layout>
