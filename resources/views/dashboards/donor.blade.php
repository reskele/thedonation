<x-layout title="Donor Dashboard">
    <div class="max-w-5xl mx-auto py-10">
        <h1 class="text-3xl font-bold text-indigo-700 mb-8 text-center">Donor Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <!-- My Donation Posts -->
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:scale-105 transition-transform duration-300">
                <div class="bg-indigo-100 p-4 rounded-full mb-3 animate-bounce">
                    <i class="fa-solid fa-gift text-3xl text-indigo-600"></i>
                </div>
                <div class="text-2xl font-bold text-indigo-700">{{ $donationPostsCount ?? 0 }}</div>
                <div class="text-gray-600">My Donation Posts</div>
            </div>
            <!-- My Clothes -->
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:scale-105 transition-transform duration-300">
                <div class="bg-yellow-100 p-4 rounded-full mb-3 animate-bounce">
                    <i class="fa-solid fa-tshirt text-3xl text-yellow-600"></i>
                </div>
                <div class="text-2xl font-bold text-yellow-700">{{ $clothesCount ?? 0 }}</div>
                <div class="text-gray-600">My Clothes</div>
            </div>
            <!-- Outfit Planner -->
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:scale-105 transition-transform duration-300">
                <div class="bg-pink-100 p-4 rounded-full mb-3 animate-bounce">
                    <i class="fa-solid fa-calendar-alt text-3xl text-pink-600"></i>
                </div>
                <div class="text-2xl font-bold text-pink-700">{{ $outfitPlansCount ?? 0 }}</div>
                <div class="text-gray-600">Outfit Planner</div>
            </div>
        </div>

        <div class="bg-gradient-to-r from-indigo-100 to-yellow-100 rounded-xl shadow-lg p-8 flex flex-col md:flex-row items-center justify-between gap-8">
            <div>
                <h2 class="text-2xl font-bold text-indigo-700 mb-2">Welcome, {{ Auth::user()->name }}!</h2>
                <p class="text-gray-700 mb-4">
                    Here you can manage your donation posts, keep track of your clothes, and plan your outfits as a donor.
                </p>
                <a href="{{ route('donation-posts.create') }}" class="inline-block bg-indigo-600 text-white px-6 py-2 rounded-lg shadow hover:bg-indigo-700 transition">Add Donation Post</a>
            </div>
            <div>
                <img src="https://lottie.host/9b1e7b7d-6e2b-4c3e-8b2a-9e2e7b7d6e2b/animation.gif" alt="Donor Animation" class="w-48 h-48 object-contain animate-pulse">
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/4e9c8e4e4a.js" crossorigin="anonymous"></script>
</x-layout>