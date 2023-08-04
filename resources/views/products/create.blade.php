<x-app-layout>
    <div class="py-6 px-4">
        <div class="max-w-md mx-auto bg-white shadow-md rounded-lg overflow-hidden">
            <h1 class="text-2xl font-semibold bg-gray-800 text-white px-4 py-3">Nuevo Producto</h1>
            <form action="{{ route('products.store') }}" method="POST" class="px-4 py-6 space-y-4">
                @csrf
                <div>
                    <label for="category_id" class="block font-semibold mb-2">Categoría</label>
                    <input type="number" name="category_id" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 rounded-md shadow-sm">
                </div>
                <div>
                    <label for="brand_id" class="block font-semibold mb-2">Marca</label>
                    <input type="number" name="brand_id" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 rounded-md shadow-sm">
                </div>
                <div>
                    <label for="name" class="block font-semibold mb-2">Nombre</label>
                    <input type="text" name="name" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 rounded-md shadow-sm">
                </div>
                <div>
                    <label for="description" class="block font-semibold mb-2">Descripción</label>
                    <input type="text" name="description" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 rounded-md shadow-sm">
                </div>
                <div>
                    <label for="purchase_price" class="block font-semibold mb-2">Precio de Compra</label>
                    <input type="number" name="purchase_price" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 rounded-md shadow-sm">
                </div>
                <div>
                    <label for="selling_price" class="block font-semibold mb-2">Precio de Venta</label>
                    <input type="number" name="selling_price" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 rounded-md shadow-sm">
                </div>
                <div>
                    <label for="status" class="block font-semibold mb-2">Estado</label>
                    <input type="number" name="status" max="1" min="0" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 rounded-md shadow-sm">
                </div>
                <div class="flex justify-center">
                    <input type="submit" value="Crear" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-md cursor-pointer">
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
