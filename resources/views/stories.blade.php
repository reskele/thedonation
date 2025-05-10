<x-head title="User Stories">
    {{-- Intro Header --}}
    <section class=" py-8">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl font-bold mb-4">Real Stories, Real Impact</h1>
            <p class="text-lg">See how your clothing donations are changing lives across the community.</p>
        </div>
    </section>

    {{-- User Stories --}}
    <section class="py-10 bg-gray-100">
        <div class="container mx-auto px-6">
            @if($stories->count())
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($stories as $story)
                        <div class="bg-white p-6 rounded-lg mt-8 shadow-md hover:shadow-xl transition">
                            <img src="{{ $story->recipient->image ? asset('storage/' . $story->recipient->image) : asset('storage/images/profiles/default.jpg') }}"
                                 alt="User Story"
                                 class="w-24 h-24 rounded-full mx-auto -mt-16 mb-4 border-2 border-green-800 object-cover">

                            <p class="text-gray-700 italic mb-4">"{{ $story->content }}"</p>

                            <div class="font-semibold text-green-800">
                                {{ $story->recipient->name ?? 'Anonymous' }}
                            </div>

                            <div class="text-sm text-gray-500">
                                Wore: {{ $story->donationRequest->donationPost->clothingItem->category ?? 'Clothing Item' }}
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-8">
                    {{ $stories->links() }}
                </div>
                
            @else
                <p class="text-center text-gray-600">No stories to show yet. Be the first to make an impact!</p>
            @endif
        </div>
    </section>

    {{-- Call to Action --}}
    <section class="bg-green-800 text-white py-16">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-4">Ready to Share the Warmth?</h2>
            <p class="mb-6 text-lg">Donate your gently used clothes and help write the next story.</p>
            <a href="{{ route('clothing-items.create') }}"
               class="bg-white text-green-800 px-6 py-3 rounded-lg font-semibold shadow hover:bg-gray-100 transition">
                Donate Now
            </a>
        </div>
    </section>
</x-head>
