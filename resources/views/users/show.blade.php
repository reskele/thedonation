<x-layout title="User Profile">
    <h1 class="text-2xl font-bold mb-4">User Details</h1>

    <div class="bg-white p-6 rounded shadow-md w-full max-w-lg space-y-4">
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
        <p><strong>Created At:</strong> {{ $user->created_at->format('d M Y') }}</p>

        <div class="flex gap-4 mt-6">
            <a href="{{ route('users.edit', $user) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                Edit
            </a>
            <a href="{{ route('users.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
                Back
            </a>
        </div>
    </div>
</x-layout>
