<x-app-layout>
    <div class="py-6 px-4">
        <div class="max-w-md mx-auto bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-4 py-3 bg-gray-800 text-white">
                <h1 class="text-2xl font-semibold">Detalles del Producto</h1>
            </div>
            <div class="px-4 py-6">
                <div class="flex justify-between mb-4">
                    <span class="font-semibold">Categoría:</span>
                    <span>{{ $product->category_id }}</span>
                </div>
                <div class="flex justify-between mb-4">
                    <span class="font-semibold">Marca:</span>
                    <span>{{ $product->brand_id }}</span>
                </div>
                <div class="flex justify-between mb-4">
                    <span class="font-semibold">Nombre:</span>
                    <span>{{ $product->name }}</span>
                </div>
                <div class="flex justify-between mb-4">
                    <span class="font-semibold">Descripción:</span>
                    <span>{{ $product->description }}</span>
                </div>
                <div class="flex justify-between mb-4">
                    <span class="font-semibold">Precio de Compra:</span>
                    <span>{{ $product->purchase_price }}</span>
                </div>
                <div class="flex justify-between mb-4">
                    <span class="font-semibold">Precio de Venta:</span>
                    <span>{{ $product->selling_price }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-semibold">Estado:</span>
                    <span>{{ $product->status ? 'Activo' : 'Inactivo' }}</span>
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-800 text-white flex justify-end">
                <a href="{{ route('products.edit', $product->id) }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md cursor-pointer">Editar</a>
            </div>
        </div>
    </div>
</x-app-layout>
