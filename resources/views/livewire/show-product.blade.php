{{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
<div class="relative inline-block text-center cursor-pointer group">
    <a href="#" wire:click="$set('open', true)">
        <i class="fa-solid fa-eye"></i>
        <div
            class="absolute z-10 px-3 py-2 mb-2 text-center text-white bg-gray-700 rounded-lg opacity-0 pointer-events-none text-md group-hover:opacity-80 bottom-full -left-3">
            Ver
            <svg class="absolute left-0 w-full h-2 text-black top-full" x="0px" y="0px" viewBox="0 0 255 255"
                xml:space="preserve">
                <polygon class="fill-current" points="0,0 127.5,127.5 255,0" />
            </svg>
        </div>
    </a>


    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            <h2 class="mt-3 text-2xl text-center">Detalles del Producto</h2>
            <span class="text-2xl text-red-400">{{$product->name}}</span>
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
</div>
