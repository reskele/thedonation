<x-layout title="Add Clothing Item">
    <h1 class="text-2xl font-bold mb-4">Add New Clothing Item</h1>

    <form method="POST" action="{{ route('clothing-items.store') }}" enctype="multipart/form-data" class="space-y-4 max-w-xl bg-white p-6 rounded shadow">
        @csrf

        <x-input label="Name" name="name"/>
        <select name="category" id="">
            <option value="top">top</option>
            <option value="hats">hats</option>
            <option value="bottom">Foot Wear</option>
            <option value="dress">dress</option>
            <option value="accesories">accesories</option>
        </select>
        <x-input label="Color" name="color" />
        <x-input label="Size" name="size" />
        <x-input label="Brand" name="brand" />
        <x-input label="Condition" name="condition" />
        <x-input label="Image" name="image" type="file" />

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save Item</button>
    </form>
</x-layout>
