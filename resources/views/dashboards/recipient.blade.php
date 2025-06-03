<x-layout title="Recipient Dashboard">
    <div class="max-w-5xl mx-auto py-10">
        <h1 class="text-3xl font-bold text-indigo-700 mb-8 text-center">Recipient Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <!-- My Stories -->
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:scale-105 transition-transform duration-300">
                <div class="bg-indigo-100 p-4 rounded-full mb-3 animate-bounce">
                    <i class="fa-solid fa-book-open text-3xl text-indigo-600"></i>
                </div>
                <div class="text-2xl font-bold text-indigo-700">{{ $storiesCount ?? 0 }}</div>
                <div class="text-gray-600">My Stories</div>
            </div>
            <!-- My Requests -->
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:scale-105 transition-transform duration-300">
                <div class="bg-green-100 p-4 rounded-full mb-3 animate-bounce">
                    <i class="fa-solid fa-hand-holding-heart text-3xl text-green-600"></i>
                </div>
                <div class="text-2xl font-bold text-green-700">{{ $requestsCount ?? 0 }}</div>
                <div class="text-gray-600">My Requests</div>
            </div>
            <!-- My Clothes -->
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:scale-105 transition-transform duration-300">
                <div class="bg-yellow-100 p-4 rounded-full mb-3 animate-bounce">
                    <i class="fa-solid fa-tshirt text-3xl text-yellow-600"></i>
                </div>
                <div class="text-2xl font-bold text-yellow-700">{{ $clothesCount ?? 0 }}</div>
                <div class="text-gray-600">My Clothes</div>
            </div>
            <!-- My Outfit Planner -->
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:scale-105 transition-transform duration-300">
                <div class="bg-pink-100 p-4 rounded-full mb-3 animate-bounce">
                    <i class="fa-solid fa-calendar-alt text-3xl text-pink-600"></i>
                </div>
                <div class="text-2xl font-bold text-pink-700">{{ $outfitPlansCount ?? 0 }}</div>
                <div class="text-gray-600">My Outfit Planner</div>
            </div>
        </div>

        <!-- Recipient relevant animation/info section -->
        <div class="bg-gradient-to-r from-indigo-100 to-pink-100 rounded-xl shadow-lg p-8 flex flex-col md:flex-row items-center justify-between gap-8">
            <div>
                <h2 class="text-2xl font-bold text-indigo-700 mb-2">Welcome, {{ Auth::user()->name }}!</h2>
                <p class="text-gray-700 mb-4">
                    Here you can manage your requests, share your stories, plan your outfits, and keep track of all your activities as a recipient.
                </p>
                <a href="{{ route('donation-requests.create') }}" class="inline-block bg-indigo-600 text-white px-6 py-2 rounded-lg shadow hover:bg-indigo-700 transition">Make a New Request</a>
            </div>
            <div>
                <!-- Example animation: Lottie or animated SVG (replace src as needed) -->
                <img src="https://lottie.host/9b1e7b7d-6e2b-4c3e-8b2a-9e2e7b7d6e2b/animation.gif" alt="Recipient Animation" class="w-48 h-48 object-contain animate-pulse">
            </div>
        </div>
    </div>
    <!-- Font Awesome CDN for icons (if not already included) -->
    <script src="https://kit.fontawesome.com/4e9c8e4e4a.js" crossorigin="anonymous"></script>
</x-layout>