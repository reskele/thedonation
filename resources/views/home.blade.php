<x-head>

    <!-- Hero Section -->
    <section class="text-gray-700 py-5">
        <div class="container mx-auto px-6 flex flex-col md:flex-row items-center justify-between">
            <!-- Left Side: Hero Message and Call to Action -->
            <div class="w-full md:w-1/2 text-center md:text-left mb-10 md:mb-0">
                <h1 class="text-5xl font-bold mb-4">Share Clothing, Spread Kindness</h1>
                <p class="text-xl mb-6">Join our mission to reduce waste and support those in need with clothing donations.</p>
                @auth
                    <a href="{{ route('clothing-items.index') }}"
                        class="bg-green-800 text-gray-200 font-md px-6 py-3 rounded shadow hover:bg-green-800">
                    Go to My Closet
                    </a>
                @else
                    <a href="{{ route('register') }}"
                       class="bg-green-800 text-gray-200 font-md px-6 py-3 rounded shadow transition duration-200 ease-in-out hover:ring-2 hover:ring-green-800 hover:ring-offset-2 hover:ring-offset-white">
                        Get Started
                    </a>
                @endauth
            </div>

            <!-- Right Side: Image Slider -->
            <div class="w-full md:w-1/2 relative h-100" x-data="{
                images: [
                    '{{ asset('storage/images/hero/1.png') }}',
                    '{{ asset('storage/images/hero/2.png') }}',
                    '{{ asset('storage/images/hero/3.png') }}',
                    '{{ asset('storage/images/hero/4.png') }}',
                ],
                currentIndex: 0,
                startSlider() {
                    setInterval(() => {
                        this.currentIndex = (this.currentIndex + 1) % this.images.length;
                    }, 4000);
                }
            }" x-init="startSlider">
                <template x-for="(image, index) in images" :key="index">
                    <img :src="image" x-show="index === currentIndex"
                         x-transition:enter="transition-opacity duration-2000"
                         x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100"
                         x-transition:leave="transition-opacity duration-2000"
                         x-transition:leave-start="opacity-100"
                         x-transition:leave-end="opacity-0"
                         class="absolute inset-0 w-full h-full object-cover" />
                </template>
            </div>
        </div>
    </section>

    {{-- User Stories --}}
    <section class="py-10 bg-gray-100">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-12">How ClothShare is Changing Lives</h2>

            @if($stories->count())
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($stories as $story)
                        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition">
                            <img src="{{ $story->recipient->image ? asset('storage/' . $story->recipient->image) : asset('storage/images/profiles/heart.jpg') }}"
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

                <div class="mt-5 text-center">
                    <a href="{{ route('stories') }}" class="text-green-800 text-2xl font-medium hover:underline">View more Stories</a>
                </div>
            @else
                <p class="text-gray-500">No stories have been shared yet. Be the first to inspire others!</p>
            @endif
        </div>
    </section>


    
</x-head>
