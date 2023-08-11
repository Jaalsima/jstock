<div class="my-auto">
    <x-secondary-button wire:click="$set('open', true)"
        class="text-blue-500 border border-blue-500 shadow-lg hover:shadow-blue-400">
        Nuevo
    </x-secondary-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            <h2 class="mt-3 text-2xl text-center">Nuevo Producto</h2>
        </x-slot>

        <div class="w-1">
            <x-slot name="content">
                <x-label value="Nombre" class="text-gray-700" />
                <x-input class="w-full" wire:model.defer="name" />
                <x-label value="Descripción" class="text-gray-700" />
                <x-input class="w-full" wire:model.defer="description" />

                <!-- Dropdown para Marca -->
                <x-label value="Marca" class="text-gray-700" />
                <select
                    class="w-full bg-gray-200 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-300 dark:text-gray-700 focus:border-blue-300 dark:focus:border-blue-400 focus:ring-blue-300 dark:focus:ring-blue-400"
                    wire:model.defer="brand_id">
                    <option value="">Selecciona una marca</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>

                <!-- Dropdown para Categoría -->
                <x-label value="Categoría" class="text-gray-700" />
                <select
                    class="w-full bg-gray-200 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-300 dark:text-gray-700 focus:border-blue-300 dark:focus:border-blue-400 focus:ring-blue-300 dark:focus:ring-blue-400"
                    wire:model.defer="category_id">
                    <option value="">Selecciona una categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <x-label value="Precio de Compra" class="text-gray-700" />
                <x-input class="w-full" type="number" min=0 wire:model.defer="purchase_price" />
                <x-label value="Precio de Venta" class="text-gray-700" />
                <x-input class="w-full" type="number" min=0 wire:model.defer="selling_price" />

                <!-- Dropdown para Estado -->
                <x-label value="Estado" class="text-gray-700" />
                <select
                    class="w-full bg-gray-200 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-300 dark:text-gray-700 focus:border-blue-300 dark:focus:border-blue-400 focus:ring-blue-300 dark:focus:ring-blue-400"
                    wire:model.defer="status">
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
                    wire:click='add'>
                    Agregar
                </x-secondary-button>
            </div>
        </x-slot>

    </x-dialog-modal>

</div>
