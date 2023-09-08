<div class="relative inline-block text-center cursor-pointer group">
    <a href="#" wire:click="$set('open_show', true)">
        <i class="p-1 text-green-400 rounded hover:text-white hover:bg-green-500 fa-solid fa-eye"></i>
        <div
            class="absolute z-10 px-3 py-2 mb-2 text-center text-white bg-gray-700 rounded-lg opacity-0 pointer-events-none text-md group-hover:opacity-80 bottom-full -left-3">
            Ver
            <svg class="absolute left-0 w-full h-2 text-black top-full" x="0px" y="0px" viewBox="0 0 255 255"
                xml:space="preserve">
                <polygon class="fill-current" points="0,0 127.5,127.5 255,0" />
            </svg>
        </div>
    </a>

    <x-dialog-modal wire:model="open_show">
        <x-slot name="title">
        </x-slot>
        <x-slot name="content">
            <div>
                <div class="mx-auto my-2 rounded-full w-52">
                    <img src="{{ asset('storage/' . $customer->image) }}" alt="{{ $customer->name }}"
                        class="w-full h-auto rounded-lg">
                </div>
                <div class="px-5 pb-5">
                    <div class="mx-6">
                        <h5
                            class="mb-4 text-3xl font-semibold tracking-tight text-center text-gray-900 dark:text-white">
                            {{ $customer->name }}</h5>
                        <div class="text-lg text-start">
                            <p><strong>Correo Electrónico:</strong> {{ $customer->email }}</p>
                            <p><strong>Dirección:</strong> {{ $customer->address }}</p>
                            <p><strong>Teléfono:</strong> {{ $customer->phone }}</p>
                            <p><strong>Estado:</strong> {{ $customer->status }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="mx-auto">
                <x-secondary-button wire:click="$set('open_show', false)"
                    class="mr-4 text-gray-500 border border-gray-500 shadow-lg hover:shadow-gray-400">
                    Salir
                </x-secondary-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
