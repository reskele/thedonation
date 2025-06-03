@auth
    @php $role = Auth::user()->role; @endphp
@endauth

<nav class="bg-slate-800 shadow-lg ">
    <div class="w-5/6 mx-auto px-4 py-1 flex justify-between items-center">
        <div class="flex items-center gap-6">
            <a href="{{ route('home') }}" class="text-xl font-bold text-green-300">ClothShare</a>
            <a class="text-lg font-medium text-gray-200" href="{{ route('home') }}">Home</a>
            <a class="text-lg font-medium text-gray-200" href="{{ route('stories') }}">Stories</a>
            <a class="text-lg font-medium text-gray-200" href="{{ route('about') }}">About</a>
        </div>
        @auth
            <x-usermenu/>
        @endauth

        @guest
            <div class="flex items-center gap-6">
                <a class="text-lg font-medium text-gray-200" href="{{ route('login') }}">Login</a>
                <a class="text-lg font-medium text-gray-200" href="{{ route('register') }}">Register</a>
            </div>
        @endguest
    </div>
</nav>
