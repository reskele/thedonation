<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'My App' }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 h-full flex flex-col min-h-screen">
    <x-navbar />

    {{-- Main Content --}}
    <main class="flex-grow container w-5/6 mx-auto p-4">
        @if (session('success'))
            <x-alert type="success" :message="session('success')" />
        @endif
        @if (session('error'))
            <x-alert type="error" :message="session('error')" />
        @endif

        {{ $slot }}
    </main>

    
    {{-- Footer --}}
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto px-6 text-center">
            <p class="mb-4">&copy; {{ date('Y') }} ClothesShare. All rights reserved.</p>
            <div class="flex justify-center space-x-4 text-gray-400">
                <a href="#" class="hover:text-white transition"><i class="fab fa-facebook"></i></a>
                <a href="#" class="hover:text-white transition"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-white transition"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="text-sm text-gray-400">
                <a href="{{ route('privacy') }}" class="px-2 hover:text-white">Privacy Terms</a>|
                <a href="{{ route('about') }}" class="px-2 hover:text-white">About</a>|
                <a href="#" class="px-2 hover:text-white">Contact</a>
            </div>
        </div>
    </footer>
</body>
</html>
