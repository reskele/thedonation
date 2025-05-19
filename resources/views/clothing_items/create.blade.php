<x-layout title="Add Clothing Item">
    <h1 class="text-2xl font-bold mb-4">Add New Clothing Item</h1>

    <form method="POST" action="{{ route('clothing-items.store') }}" enctype="multipart/form-data" class="space-y-4 max-w-xl bg-white p-6 rounded shadow">
        @csrf

        <x-input label="Name" name="name"/>
        <select name="category" id="category"  class="space-y-4 max-w-xl bg-white p-6 rounded shadow">
            <option value="" disabled selected>select a category</option>
            <option value="tops">Tops</option>
            <option value="bottoms">Bottoms</option>
            <option value="onepiece">Onepiece</option>
            <option value="outerwear">outerWear</option>
             <option value="sportswear">sportsWear</option>
            <option value="sleepwear">sleepWear</option>
            <option value="undergarments">undergarments</option>
            <option value="accesories">accesories</option>
            <option value="footwear">footWear</option>
        </select> 
        <x-input label="Color" name="color" />
        <x-input label="Size" name="size" />
        <x-input label="Brand" name="brand" />
        <x-input label="Condition" name="condition" />
        <x-input label="Image" name="image" type="file" />

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save Item</button>
    </form>
</x-layout>
