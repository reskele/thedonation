<x-layout title="About Us">
    <section class="bg-gradient-to-br from-green-50 to-white min-h-screen flex items-center justify-center py-12">
        <div class="max-w-2xl w-full bg-white rounded-xl shadow-lg p-8">
            <h1 class="text-4xl font-extrabold text-green-700 mb-4 text-center">About Our Platform</h1>
            <p class="text-lg text-gray-700 mb-6 text-center">
                Welcome to <span class="font-semibold text-green-600">{{ config('', 'ClothShare') }}</span>!<br>
                We connect generous donors with recipients in need across Tanzania, making it easy to share clothing and essentials with those who need them most.
            </p>
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-green-600 mb-2">Our Mission</h2>
                <p class="text-gray-600">
                    To foster a culture of giving and community support by providing a seamless, transparent, and secure platform for clothing donations. We believe in dignity, sustainability, and the power of community.
                </p>
            </div>
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-green-600 mb-2">How It Works</h2>
                <ul class="list-disc list-inside text-gray-600 space-y-1">
                    <li>Donors list clothing items they wish to give away.</li>
                    <li>Recipients browse available donations and request what they need.</li>
                    <li>Our platform facilitates a helping culture.</li>
                </ul>
            </div>
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-green-600 mb-2">Why Choose Us?</h2>
                <ul class="list-disc list-inside text-gray-600 space-y-1">
                    <li>Trusted by communities across Tanzania</li>
                    <li>User-friendly </li>
                    <li>Privacy and security for all users</li>
                    <li>Support for both donors and recipients</li>
                </ul>
            </div>
            <div class="text-center mt-8">
                <a href="{{ route('home') }}" class="inline-block bg-green-600 text-white px-6 py-2 rounded-lg shadow hover:bg-green-700 transition">
                    Back to Home
                </a>
            </div>
        </div>
    </section>
</x-layout>