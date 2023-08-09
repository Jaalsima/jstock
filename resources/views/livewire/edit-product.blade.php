{{-- The whole world belongs to you. --}}

<div class="relative inline-block text-center cursor-pointer group">
    <a href="#" wire:click="$set('open', true)">
        <i class="fa-solid fa-pen-to-square"></i>  
        <div class="absolute z-10 px-3 py-2 mb-2 text-center text-white bg-gray-700 rounded-lg opacity-0 pointer-events-none text-md group-hover:opacity-80 bottom-full -left-6">
            Editar
            <svg class="absolute left-0 w-full h-2 text-black top-full" x="0px"
                y="0px" viewBox="0 0 255 255" xml:space="preserve">
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
            Hola
            </x-slot>
        </div>

        <x-slot name="footer">
            <div class="mx-auto">
                <x-secondary-button wire:click="$set('open', false)"
                    class="mr-4 text-red-500 border border-red-500 shadow-lg hover:shadow-red-400">
                    Cancelar
                </x-secondary-button>
                <x-secondary-button class="text-green-500 border border-green-500 shadow-xl hover:shadow-green-400"
                    wire:click='add'>
                    Agregar
                </x-secondary-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
