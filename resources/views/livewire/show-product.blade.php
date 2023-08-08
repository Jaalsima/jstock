{{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

<x-dialog-modal wire:model="open">
    <x-slot name="title">
        <h2 class="mt-3 text-2xl text-center">Detalles del Producto</h2>
    </x-slot>
    <x-slot name="content">
        <div>
            <p><strong>Nombre:</strong> {{ $product->name }}</p>
            <p><strong>Descripción:</strong> {{ $product->description }}</p>
            <p><strong>Categoría:</strong> {{ $product->category->name }}</p>
            <p><strong>Marca:</strong> {{ $product->brand->name }}</p>
            <p><strong>Precio de Compra:</strong> {{ $product->purchase_price }}</p>
            <p><strong>Precio de Venta:</strong> {{ $product->selling_price }}</p>
            <p><strong>Estado:</strong> {{ $product->status }}</p>
        </div>
    </x-slot>
    <x-slot name="footer">
        <div class="mx-auto">
            <x-secondary-button wire:click="$set('open', false)"
                class="mr-4 text-red-500 border border-red-500 shadow-lg hover:shadow-red-400">
                Salir
            </x-secondary-button>
        </div>
    </x-slot>
</x-dialog-modal>
