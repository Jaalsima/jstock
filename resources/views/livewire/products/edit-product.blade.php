<div class="relative inline-block text-center cursor-pointer group">
    <a href="#" wire:click="$set('open', true)">
        <i class="p-1 text-blue-400 rounded hover:text-white hover:bg-blue-500 fa-solid fa-pen-to-square"></i>
        <div
            class="absolute z-10 px-3 py-2 mb-2 text-center text-white bg-gray-700 rounded-lg opacity-0 pointer-events-none text-md group-hover:opacity-80 bottom-full -left-6">
            Editar
            <svg class="absolute left-0 w-full h-2 text-black top-full" x="0px" y="0px" viewBox="0 0 255 255"
                xml:space="preserve">
            </svg>
        </div>
    </a>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            <h2 class="mt-3 text-2xl text-center">Editar Producto</h2>
        </x-slot>

        <div class="w-1">
            <x-slot name="content">
                <!-- Imagen -->
                <div class="relative mt-4">
                    <label
                        class="flex flex-col items-center justify-center h-48 gap-4 p-6 mx-auto bg-white border-2 border-gray-300 border-dashed rounded-lg shadow-md cursor-pointer w-72">
                        <div class="flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#ddd" viewBox="0 0 24 24"
                                class="w-16 h-16 text-gray-600">
                                <path
                                    d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z"
                                    clip-rule="evenodd" fill-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="text-center">
                            <span class="font-normal text-gray-600">Cambiar imagen del producto (opcional)</span>
                        </div>
                        <input type="file" class="hidden" wire:model.lazy="image">
                        <div class="absolute top-0 h-48 w-72">
                            @if ($image)
                                <img class="object-cover w-full h-full rounded-lg" src="{{ $image->temporaryUrl() }}"
                                    class="mb-4" alt="Image">
                            @else
                                <img class="object-cover w-full h-full rounded-lg"
                                    src="{{ asset('storage/' . $product->image) }}" class="mb-4" alt="Image">
                            @endif
                        </div>
                    </label>
                </div>

                <!-- Nombre -->
                <div class="mt-4">
                    <x-label for="name" value="Nombre" class="text-gray-700" />
                    <x-input id="name" class="w-full" wire:model.lazy="name" />
                    <x-input-error for="name" />
                </div>

                <!-- Descripción -->
                <div class="mt-4">
                    <x-label for="description" value="Descripción" class="text-gray-700" />
                    <x-input id="description" class="w-full" wire:model.lazy="description" />
                    <x-input-error for="description" />
                </div>

                <!-- Almacén -->
                <div class="mt-4">
                    <x-label for="current_stock" value="Almacén" class="text-gray-700" />
                    <x-input id="current_stock" type="number" min="0" class="w-full"
                        wire:model.lazy="current_stock" />
                    <x-input-error for="current_stock" />
                </div>

                <!-- Unidad de medida -->
                <div class="mt-4">
                    <x-label for="measurement_unit" value="Unidad de medida" class="text-gray-700" />
                    <x-input id="measurement_unit" class="w-full" wire:model.lazy="measurement_unit" />
                    <x-input-error for="measurement_unit" />
                </div>

                <!-- Dropdown para Marca -->
                <div class="mt-4">
                    <x-label for="product.brand_id" value="Marca" class="text-gray-700" />
                    <select id="brand_id" class="w-full rounded-md" wire:model.lazy="product.brand_id">
                        <option value="">Selecciona una marca</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="brand_id" />
                </div>

                <!-- Dropdown para Categoría -->
                <div class="mt-4">
                    <x-label for="product.category_id" value="Categoría" class="text-gray-700" />
                    <select id="category_id" class="w-full rounded-md" wire:model.lazy="product.category_id">
                        <option value="">Selecciona una categoría</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="category_id" />
                </div>

                <!-- Dropdown para Proveedor -->
                <div class="mt-4">
                    <x-label for="product.supplier_id" value="Proveedor" class="text-gray-700" />
                    <select id="supplier_id" class="w-full rounded-md" wire:model.lazy="product.supplier_id">
                        <option value="">Selecciona un proveedor</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="supplier_id" />
                </div>

                <!-- Precio de Compra -->
                <div class="mt-4">
                    <x-label for="purchase_price" value="Precio de Compra" class="text-gray-700" />
                    <x-input id="purchase_price" type="number" min="0" class="w-full"
                        wire:model.lazy="purchase_price" />
                    <x-input-error for="purchase_price" />
                </div>

                <!-- Precio de Venta -->
                <div class="mt-4">
                    <x-label for="selling_price" value="Precio de Venta" class="text-gray-700" />
                    <x-input id="selling_price" type="number" min="0" class="w-full"
                        wire:model.lazy="selling_price" />
                    <x-input-error for="selling_price" />
                </div>

                <!-- Dropdown para Estado -->
                <div class="mt-4">
                    <x-label for="status" value="Estado" class="text-gray-700" />
                    <select id="status" class="w-full mb-4 rounded-md" wire:model.lazy="status">
                        <option value="">Selecciona un estado</option>
                        <option value="Disponible">Disponible</option>
                        <option value="No Disponible">No Disponible</option>
                        <option value="Agotado">Agotado</option>
                        <option value="Expirable">Expirable</option>
                        <option value="Vencido">Vencido</option>
                    </select>
                    <x-input-error for="status" />
                </div>

                <!-- Caducidad -->
                <div class="mt-4">
                    <x-label for="expiration" value="Caducidad" class="text-gray-700" />
                    <x-input id="expiration" type="date" class="w-full" wire:model.lazy="expiration" />
                    <x-input-error for="expiration" />
                </div>

                <!-- Observaciones -->
                <div class="mt-4">
                    <x-label for="observations" value="Observaciones" class="text-gray-700" />
                    <x-input id="observations" type="text" class="w-full" wire:model.lazy="observations" />
                    <x-input-error for="observations" />
                </div>
            </x-slot>
        </div>
        <x-slot name="footer">
            <div class="mx-auto">
                <x-secondary-button wire:click="$set('open', false)"
                    class="mr-4 text-gray-500 border border-gray-500 shadow-lg hover:shadow-gray-400">
                    Cancelar
                </x-secondary-button>
                <x-secondary-button
                    class="text-blue-500 border border-blue-500 shadow-lg hover:shadow-blue-400 disabled:opacity-25"
                    wire:click="update" wire:loading.attr="disabled">
                    Actualizar
                </x-secondary-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
