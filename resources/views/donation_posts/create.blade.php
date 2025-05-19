<x-layout title="Create Donation Post">
    <h1 class="text-2xl font-bold mb-4">Create a New Donation Post</h1>

    @if ($clothingItems->isEmpty())
        <p class="text-gray-600">You have no clothing items available to post.</p>
    @else
        <form method="POST" action="{{ route('donation-posts.store') }}" class="bg-white p-6 rounded shadow max-w-xl space-y-4">
            @csrf

            <div>
                <label class="block font-medium mb-1">Select Clothing Item</label>
                <select name="clothing_item_id" class="w-full border-gray-300 rounded shadow-sm">
                    <option value="">-- Choose an item --</option>
                    @foreach ($clothingItems as $item)
                        <option value="{{ $item->id }}" {{ old('clothing_item_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->name }} ({{ $item->size }}, {{ $item->gender }})
                        </option>
                    @endforeach
                </select>
                @error('clothing_item_id')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            
<!-- Gender Field -->
<div>
    <label class="block font-medium mb-1">Gender</label>
    <select name="gender" class="w-full border-gray-300 rounded shadow-sm" required>
        <option value="">-- Select gender --</option>
        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
    </select>
    @error('gender')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
    @enderror
</div>


<!-- Description Field -->
<div>
    <label class="block font-medium mb-1">Description</label>
    <textarea name="description" rows="4" maxlength="2000" class="w-full border-gray-300 rounded shadow-sm" placeholder="Describe your donation (max 400 words)">{{ old('description') }}</textarea>
    @error('description')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
    @enderror
</div>


              <!-- Select Region -->
            <div>
                <label class="block font-medium mb-1">Region</label>
                <select name="region" class="w-full border-gray-300 rounded shadow-sm">
                    <option value="">-- Select a region --</option>
                    @foreach ([
                        'Arusha', 'Dar es Salaam', 'Dodoma', 'Geita', 'Iringa', 'Kagera', 'Katavi', 'Kigoma',
                        'Kilimanjaro', 'Lindi', 'Manyara', 'Mara', 'Mbeya', 'Morogoro', 'Mtwara', 'Mwanza',
                        'Njombe', 'Pemba North', 'Pemba South', 'Pwani', 'Rukwa', 'Ruvuma', 'Shinyanga',
                        'Simiyu', 'Singida', 'Tabora', 'Tanga', 'Zanzibar North', 'Zanzibar South', 'Zanzibar West'
                    ] as $region)
                        <option value="{{ $region }}" {{ old('region') == $region ? 'selected' : '' }}>
                            {{ $region }}
                        </option>
                    @endforeach
                </select>
                @error('region')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

               <!-- Contacts Field -->
            <div>
                <label class="block font-medium mb-1">Contacts</label>
                <input type="text" name="contacts" class="w-full border-gray-300 rounded shadow-sm" value="{{ old('contacts') }}" placeholder="format:+255XXXXXXXXXX " pattern="^(\+255|0)[67][0-8]{8}$" maxlength="13">
                @error('contacts')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>



            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Create Post</button>
        </form>
    @endif
</x-layout>
