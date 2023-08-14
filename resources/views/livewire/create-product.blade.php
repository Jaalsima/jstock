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
                {{-- <form wire:submit.prevent="add"> --}}

                '@if($image)
                    <img src="{{$image->temporaryUrl()}}" class="mb-4" alt="Image">
                @endif
                    
                    <x-label value="Nombre" class="text-gray-700" />
                    <x-input class="w-full" wire:model.debounce="name" />
                    <x-input-error for="name"/>

                    <x-label value="Descripción" class="text-gray-700" />
                    <x-input class="w-full" wire:model.debounce="description" />
                    <x-input-error for="description"/>

                    <!-- Dropdown para Marca -->
                    <x-label value="Marca" class="text-gray-700" />
                    <select class="w-full" wire:model.lazy="brand_id">
                        <option value="">Selecciona una marca</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="brand_id"/>

                    <!-- Dropdown para Categoría -->
                    <x-label value="Categoría" class="text-gray-700" />
                    <select class="w-full" wire:model.lazy="category_id">
                        <option value="">Selecciona una categoría</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                   <x-input-error for="category_id"/>

                    <x-label value="Precio de Compra" class="text-gray-700" />
                    <x-input class="w-full" type="number" min="0" wire:model.lazy="purchase_price" />
                    <x-input-error for="purchase_price"/>

                    <x-label value="Precio de Venta" class="text-gray-700" />
                    <x-input class="w-full" type="number" min="0" wire:model.lazy="selling_price" />
                    <x-input-error for="selling_price"/>

                    <!-- Dropdown para Estado -->
                    <x-label value="Estado" class="text-gray-700" />
                    <select class="w-full" wire:model.lazy="status">
                        <option value="">Selecciona un estado</option>
                        <option value="Disponible">Disponible</option>
                        <option value="No Disponible">No Disponible</option>
                        <option value="En Espera">En Espera</option>
                    </select>
                    <x-input-error for="status"/>

                    <x-label value="Imágen" class="text-gray-700" />
                    <input class="w-full" type="file" wire:model="image" id="{{$unique_input_identifier}}"/>
                    <x-input-error for="image"/>

                {{-- </form> --}}
            </x-slot>
        </div>

        <x-slot name="footer">
            <div class="mx-auto">
                <x-secondary-button wire:click="$set('open', false)"
                    class="mr-4 text-gray-500 border border-gray-500 shadow-lg hover:shadow-gray-400">
                    Cancelar
                </x-secondary-button>
                <x-secondary-button class="text-blue-500 border border-blue-500 shadow-lg hover:shadow-blue-400 disabled:opacity-50 disabled:bg-blue-600 disabled:text-white"
                    wire:click="add" wire:loading.attr="disabled" wire:target="add, image" >
                    Agregar
                </x-secondary-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
