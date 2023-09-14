<div class="relative inline-block text-center cursor-pointer group">
    <a href="#" wire:click="$set('open', true)">
        <i class="p-1 text-red-400 rounded hover:text-white hover:bg-red-400 fa-solid fa-trash"></i>
        <div
            class="absolute z-10 px-3 py-2 mb-2 text-center text-white bg-gray-700 rounded-lg opacity-0 pointer-events-none text-md group-hover:opacity-80 bottom-full -left-3">
            Eliminar
            <svg class="absolute left-0 w-full h-2 text-black top-full" x="0px" y="0px" viewBox="0 0 255 255"
                xml:space="preserve">
            </svg>
        </div>
    </a>


    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            <h3 class="w-full py-2 text-2xl text-center text-gray-100 bg-red-400 border-2 border-red-500 rounded-lg ">
                Eliminar</h3>
        </x-slot>

        <x-slot name="content">
            <p class="text-xl text-gray-500">¿Estás seguro de que deseas
                eliminar este
                producto?
            </p>
        </x-slot>

        <x-slot name="footer">
            <div class="mt-4 text-center">
                <x-secondary-button wire:click="$set('open', false)"
                    class="mr-4 text-gray-500 border border-gray-500 shadow-lg hover:bg-gray-300 hover:shadow-gray-400">
                    Cancelar
                </x-secondary-button>
                <x-secondary-button wire:click="deleteConfirmed"
                    class="mr-4 text-red-500 border border-red-500 shadow-lg hover:bg-red-200 hover:shadow-red-400">
                    Eliminar
                </x-secondary-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
