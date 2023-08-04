<div>
    <x-secondary-button wire:click="$set('open', true)">
        Nuevo
    </x-secondary-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            <h2 class="mt-3 text-2xl text-center">Nuevo Producto</h2>
        </x-slot>

        <div class="w-1">
            <x-slot name="content">
                <x-label value="Nombre" class="text-gray-700" />
                <x-input class="w-full" />
                <x-label value="Descripción" class="text-gray-700" />
                <x-input class="w-full" />
                <x-label value="Marca" class="text-gray-700" />
                <x-input class="w-full" />
                <x-label value="Categoría" class="text-gray-700" />
                <x-input class="w-full" />
                <x-label value="Precio de Compra" class="text-gray-700" />
                <x-input class="w-full" />
                <x-label value="Precio de Venta" class="text-gray-700" />
                <x-input class="w-full" />
                <x-label value="Estado" class="text-gray-700" />
                <x-input class="w-full" />
            </x-slot>
        </div>

        <x-slot name="footer">
            <div class="mx-auto">
                <x-secondary-button wire:click="$set('open', false)"
                    class="mr-4 text-red-500 border border-red-500 shadow-lg hover:shadow-red-400">
                    Cancelar
                </x-secondary-button>
                <x-secondary-button class="text-green-500 border border-green-500 shadow-xl hover:shadow-green-400">
                    Agregar
                </x-secondary-button>
            </div>
        </x-slot>

    </x-dialog-modal>

</div>
