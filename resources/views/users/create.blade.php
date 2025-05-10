<x-layout title="Add New User">
    <h1 class="text-2xl font-bold mb-4">Create New User</h1>

    <form action="{{ route('users.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow-md w-full max-w-lg">
        @csrf

        <x-input label="Name" name="name" required />
        <x-input label="Email" name="email" type="email" required />
        <x-input label="Password" name="password" type="password" required />
        <x-input label="Confirm Password" name="password_confirmation" type="password" required />

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Create User
        </button>
    </form>
</x-layout>
