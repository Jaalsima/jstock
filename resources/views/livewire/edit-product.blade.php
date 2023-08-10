{{-- The whole world belongs to you. --}}

<div class="relative inline-block text-center cursor-pointer group">
    <a href="#" wire:click="$set('open', true)">
        <i class="fa-solid fa-pen-to-square"></i>
        <div
            class="absolute z-10 px-3 py-2 mb-2 text-center text-white bg-gray-700 rounded-lg opacity-0 pointer-events-none text-md group-hover:opacity-80 bottom-full -left-6">
            Editar
            <svg class="absolute left-0 w-full h-2 text-black top-full" x="0px" y="0px" viewBox="0 0 255 255"
                xml:space="preserve">
                <polygon class="fill-current" points="0,0 127.5,127.5 255,0" />
            </svg>
        </div>
    </a>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            <h2 class="mt-3 text-2xl text-center">Editar Producto</h2>
        </x-slot>
        <div class="w-1">
            <x-slot name="content">
                <x-label value="Nombre" class="text-gray-700 text-start" />
                <x-input class="w-full mb-2 " wire:model.defer="product.name" />
                <x-label value="Descripción" class="text-gray-700 text-start" />
                <x-input class="w-full mb-2 " wire:model.defer="product.description" />

                <!-- Dropdown para Marca -->
                <x-label value="Marca" class="text-gray-700 text-start" />
                <select
                    class="w-full mb-2 bg-gray-200 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-300 dark:text-gray-700 focus:border-blue-300 dark:focus:border-blue-400 focus:ring-blue-300 dark:focus:ring-blue-400"
                    wire:model.defer="product.brand_id">
                    <option value="">Selecciona una marca</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>

                <!-- Dropdown para Categoría -->
                <x-label value="Categoría" class="text-gray-700 text-start" />
                <select
                    class="w-full mb-2 bg-gray-200 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-300 dark:text-gray-700 focus:border-blue-300 dark:focus:border-blue-400 focus:ring-blue-300 dark:focus:ring-blue-400"
                    wire:model.defer="product.category_id">
                    <option value="">Selecciona una categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <x-label value="Precio de Compra" class="text-gray-700 text-start" />
                <x-input class="w-full mb-2 " wire:model.defer="product.purchase_price" />
                <x-label value="Precio de Venta" class="text-gray-700 text-start" />
                <x-input class="w-full mb-2 " wire:model.defer="product.selling_price" />

                <!-- Dropdown para Estado -->
                <x-label value="Estado" class="text-gray-700 text-start" />
                <select
                    class="w-full mb-2 bg-gray-200 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-300 dark:text-gray-700 focus:border-blue-300 dark:focus:border-blue-400 focus:ring-blue-300 dark:focus:ring-blue-400"
                    wire:model.defer="product.status">
                    <option value="">Selecciona un estado</option>
                    <option value="Disponible">Disponible</option>
                    <option value="No Disponible">No Disponible</option>
                    <option value="En Espera">En Espera</option>
                </select>
            </x-slot>
        </div>

        <x-slot name="footer">
            <div class="mx-auto">
                <x-secondary-button wire:click="$set('open', false)"
                    class="mr-4 text-gray-500 border border-gray-500 shadow-lg hover:shadow-gray-400">
                    Cancelar
                </x-secondary-button>
                <x-secondary-button class="text-blue-500 border border-blue-500 shadow-lg hover:shadow-blue-400"
                    wire:click="update">
                    Actualizar
                </x-secondary-button>
            </div>
        </x-slot>

    </x-dialog-modal>
</div>
