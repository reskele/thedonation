<x-head title="Login">
    <div>
        <h1 class="text-2xl text-center font-bold mb-4">Login</h1>

        <form method="POST" action="{{ route('login') }}" class="space-y-4 max-w-lg mx-auto bg-white p-6 rounded shadow">
            @csrf

            <x-input label="Email" name="email" type="email"  />
            <x-input label="Password" name="password" type="password"  />

            <button class="bg-green-700 text-white px-4 py-2 rounded hover:bg-blue-700">Login</button>
        </form>

        <div class="mt-4 text-center">
            <p>Don't have an account? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register here</a></p>
        </div>
    </div>
</x-head>
