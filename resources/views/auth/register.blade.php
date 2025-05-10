<x-head title="Register">
    <div>
        <h1 class="text-2xl text-center font-bold mb-4">Create</h1>

        <form method="POST" action="{{ route('register') }}" class="space-y-4 max-w-lg mx-auto bg-white p-6 rounded shadow">
            @csrf

            <x-input label="Name" name="name"  />
            <x-input label="Email" name="email" />
            <select name="role" id=""         
                class="w-full border-2 border-gray-400 px-4 py-2 rounded shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            >
                <option value="">Select Role</option>
                <option value="donor">Donor</option>
                <option value="recipient">recipient</option>
            </select>
            <x-input label="Password" name="password" type="password"  />
            <x-input label="Confirm Password" name="password_confirmation" type="password"  />


            <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Register</button>
        </form>

        <div class="mt-4 text-center">
            <p>Already have an account? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login here</a></p>
        </div>
    </div>
</x-head>
