<x-layout title="Edit User">
    <h1 class="text-2xl font-bold mb-4">Edit User - {{ $user->name }}</h1>

    <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow-md w-full max-w-lg">
        @csrf
        @method('PUT')

        <x-input label="Name" name="name" value="{{ $user->name }}" required />
        <x-input label="Email" name="email" value="{{ $user->email }}" type="email" required />
        <x-input label="New Password (optional)" name="password" type="password" />
        <x-input label="Confirm Password" name="password_confirmation" type="password" />

        <button class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
            Update User
        </button>
    </form>
</x-layout>
