<div class="my-auto">
    <x-secondary-button wire:click="$set('open_create', true)"
        class="float-right text-blue-500 dark:bg-gray-800 bg-blue-100 border border-blue-500 shadow-md hover:shadow-blue-400 hover:bg-blue-400 hover:text-white">
        <i class="fa fa-solid fa-user-plus"> Nuevo</i>
    </x-secondary-button>

    <x-dialog-modal wire:model="open_create">
        <x-slot name="title">
            <h2 class="mt-3 text-2xl text-center">Nuevo Proveedor</h2>
        </x-slot>

        <div class="w-1">
            <x-slot name="content">

                <form>
                    <!-- Imágen -->
                    <div class="relative my-4">
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
                                <span class="font-normal text-gray-600">Agrega una foto del proveedor</span>
                            </div>
                            <input type="file" class="hidden" wire:model.lazy="image">
                            <div class="absolute top-0 h-48 w-72">
                                @if ($image)
                                    <img class="object-cover w-full h-full rounded-lg"
                                        src="{{ $image->temporaryUrl() }}" class="mb-4" alt="Imagen de Proveedor">
                                @endif
                            </div>
                        </label>
                    </div>
                    <x-input-error for="image" />

                    <!-- Documento de Identidad -->
                    <x-label value="Documento de identidad" class="text-gray-700" />
                    <x-input class="w-full" wire:model.lazy="document" />
                    <x-input-error for="document" />

                    <!-- Nombre -->
                    <x-label for="name" value="Nombre" class="ml-3 text-gray-700" />
                    <x-input class="w-full" wire:model.lazy="name" id="name" />
                    <x-input-error for="name" />

                    <!-- Correo Electrónico -->
                    <x-label for="email" value="Correo Electrónico" class="ml-3 text-gray-700" />
                    <x-input class="w-full" wire:model.lazy="email" type="email" id="email" />
                    <x-input-error for="email" />

                    <!-- Dirección -->
                    <x-label for="address" value="Dirección" class="ml-3 text-gray-700" />
                    <x-input class="w-full" wire:model.lazy="address" id="address" />
                    <x-input-error for="address" />

                    <!-- Teléfono -->
                    <x-label for="phone" value="Teléfono" class="ml-3 text-gray-700" />
                    <x-input class="w-full" wire:model.lazy="phone" id="phone" />
                    <x-input-error for="phone" />

                    <!-- Dropdown para Estado -->
                    <x-label for="status" value="Estado" class="ml-3 text-gray-700" />
                    <select class="w-full mb-4 rounded-md" wire:model.lazy="status" id="status">
                        <option value="">Selecciona un estado</option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                    <x-input-error for="status" />
                </form>

            </x-slot>

            <x-slot name="footer">
                <div class="mx-auto">
                    <x-secondary-button wire:click="$set('open_create', false)"
                        class="mr-4 text-gray-500 border border-gray-500 shadow-lg hover:bg-gray-400 hover:shadow-gray-400">
                        Cancelar
                    </x-secondary-button>
                    <x-secondary-button
                        class="text-blue-500 border border-blue-500 shadow-lg hover:bg-blue-400 hover:shadow-blue-400 disabled:opacity-50 disabled:bg-blue-600 disabled:text-white"
                        wire:click="create_supplier" wire:loading.attr="disabled" wire:target="create_supplier, image">
                        Agregar
                    </x-secondary-button>
                </div>
            </x-slot>
        </div>
    </x-dialog-modal>
</div>
