<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Clothing Platform' }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen antialiased">
    <x-authnav />
    <div class="flex">
        <x-sidebar />
        <main class="flex-1 p-6 overflow-x-hidden">
            @if(session('success'))
                <x-alert type="success" :message="session('success')" />
            @endif

            @if($errors->any())
                <x-alert type="error" :message="$errors->first()" />
            @endif

            {{ $slot }}
        </main>
    </div>
</body>
</html>