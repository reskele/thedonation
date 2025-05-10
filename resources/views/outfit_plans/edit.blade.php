<x-layout title="Edit Outfit Plan">
    <h1 class="text-2xl font-bold mb-4">Edit Outfit Plan</h1>

    <form method="POST" action="{{ route('outfit-plans.update', $outfitPlan) }}" class="bg-white p-6 rounded shadow max-w-xl space-y-4">
        @csrf
        @method('PUT')

        <x-input label="Note" name="note" value="{{ $outfitPlan->note }}" required />
        <x-input label="Date" name="date" type="date" value="{{ $outfitPlan->date }}" required />

        <div>
            <label class="block font-medium mb-1">Clothing Items</label>
            <div class="grid grid-cols-2 gap-2">
                @foreach ($clothingItems as $item)
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="clothing_item_ids[]" value="{{ $item->id }}"
                            @if($outfitPlan->clothingItems->pluck('id')->contains($item->id)) checked @endif
                            class="form-checkbox rounded text-blue-600" />
                        <span>{{ $item->name }}</span>
                    </label>
                @endforeach
            </div>
            @error('clothing_item_ids')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Update</button>
    </form>
</x-layout>
