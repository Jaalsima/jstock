<div>
    <a href="#" wire:click="$set('open', true)">
        <i class="p-1 text-blue-400 rounded hover:text-white hover:bg-blue-500 fa-solid fa-pen-to-square"></i>
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
            <h2 class="mt-3 text-2xl text-center">Editar Cliente</h2>
        </x-slot>

        <div class="w-1">
            <x-slot name="content">
                <form wire:submit.prevent="update">
                    <!-- Nombre -->
                    <div class="mt-4">
                        <x-label for="name" value="Nombre" class="text-gray-700" />
                        <x-input id="name" class="w-full" wire:model.lazy="name" />
                        <x-input-error for="name" />
                    </div>

                    <!-- Email -->
                    <div class="mt-4">
                        <x-label for="email" value="Email" class="text-gray-700" />
                        <x-input id="email" type="email" class="w-full" wire:model.lazy="email" />
                        <x-input-error for="email" />
                    </div>

                    <!-- Dirección -->
                    <div class="mt-4">
                        <x-label for="address" value="Dirección" class="text-gray-700" />
                        <x-input id="address" class="w-full" wire:model.lazy="address" />
                        <x-input-error for="address" />
                    </div>

                    <!-- Teléfono -->
                    <div class="mt-4">
                        <x-label for="phone" value="Teléfono" class="text-gray-700" />
                        <x-input id="phone" class="w-full" wire:model.lazy="phone" />
                        <x-input-error for="phone" />
                    </div>

                    <!-- Slug -->
                    <div class="mt-4">
                        <x-label for="slug" value="Slug" class="text-gray-700" />
                        <x-input id="slug" class="w-full" wire:model.lazy="slug" />
                        <x-input-error for="slug" />
                    </div>

                    <!-- Dropdown para Estado -->
                    <div class="mt-4">
                        <x-label for="status" value="Estado" class="text-gray-700" />
                        <select id="status" class="w-full mb-4 rounded-md" wire:model.lazy="status">
                            <option value="">Selecciona un estado</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                        <x-input-error for="status" />
                    </div>
                </form>
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
