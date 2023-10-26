<div>
    <!-- Verificar si hay proveedores antes de renderizar la tabla y su encabezado -->

    @if ($suppliers->count() > 0)
        <div>
            <div class="grid items-center w-full grid-cols-12 mt-2">
                <div class="col-span-4">
                    <input type="text" name="search" wire:model="search"
                        class="w-full bg-white border-none rounded-lg focus:ring-gray-400" placeholder="Buscar...">
                </div>
                <div class="col-span-4">
                    <div class="text-xl font-bold text-center text-blue-400 uppercase">
                        <h1>Proveedores</h1>
                    </div>
                </div>
                <div class="col-span-4">
                    <livewire:suppliers.create-supplier />
                </div>
            </div>
            <div class="py-4 ml-4 text-gray-500 ">
                Registros por página
                <input type="number" name="perPage" wire:model="perPage"
                    class="w-[70px] pr-2 py-1 cursor-pointer bg-white border-none rounded-lg focus:ring-gray-400">
            </div>

            <div class="relative mt-4 overflow-x-hidden shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead
                        class="text-sm text-center text-gray-100 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('id')">
                                ID
                                @if ($sort == 'id')
                                    @if ($direction == 'asc')
                                        <i class="ml-2 fa-solid fa-arrow-up-z-a"></i>
                                    @else
                                        <i class="ml-2 fa-solid fa-arrow-down-z-a"></i>
                                    @endif
                                @else
                                    <i class="ml-2 fa-solid fa-sort"></i>

                                @endif
                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('document')">
                                Documento
                                @if ($sort == 'document')
                                    @if ($direction == 'asc')
                                        <i class="ml-2 fa-solid fa-arrow-up-z-a"></i>
                                    @else
                                        <i class="ml-2 fa-solid fa-arrow-down-z-a"></i>
                                    @endif
                                @else
                                    <i class="ml-2 fa-solid fa-sort"></i>

                                @endif

                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('name')">
                                Nombre
                                @if ($sort == 'name')
                                    @if ($direction == 'asc')
                                        <i class="ml-2 fa-solid fa-arrow-up-z-a"></i>
                                    @else
                                        <i class="ml-2 fa-solid fa-arrow-down-z-a"></i>
                                    @endif
                                @else
                                    <i class="ml-2 fa-solid fa-sort"></i>

                                @endif

                            </th>

                            <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('email')">
                                Correo
                                @if ($sort == 'email')
                                    @if ($direction == 'asc')
                                        <i class="ml-2 fa-solid fa-arrow-up-z-a"></i>
                                    @else
                                        <i class="ml-2 fa-solid fa-arrow-down-z-a"></i>
                                    @endif
                                @else
                                    <i class="ml-2 fa-solid fa-sort"></i>

                                @endif

                            </th>

                            {{-- <th scope="col" class="px-6 py-3">
                                Dirección
                            </th> --}}

                            <th scope="col" class="px-6 py-3">
                                Teléfono
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Estado
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($suppliers as $supplier)
                            <div class="hidden">
                                @if ($supplier->status === 'Activo')
                                    {{ $colorStatus = 'text-green-600' }}
                                @else
                                    {{ $colorStatus = 'text-red-500' }}
                                @endif
                            </div>
                            <tr
                                class="text-center bg-white border-b text-md dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $supplier->id }}
                                </th>
                                <td class="px-6 py-4 dark:text-lg">{{ $supplier->document }}</td>
                                <td class="px-6 py-4 dark:text-lg">{{ $supplier->name }}</td>
                                <td class="px-6 py-4 ">{{ $supplier->email }}</td>
                                {{-- <td class="px-6 py-4 ">{{ $supplier->address }}</td> --}}
                                <td class="px-6 py-4 ">{{ $supplier->phone }}</td>
                                <td class="px-6 py-4 dark:text-lg {{ $colorStatus }}">{{ $supplier->status }}</td>
                                <td class="flex justify-around py-4 pl-2 pr-8">

                                    {{-- Modales de detalle, actualización y eliminación de proveedores. --}}
                                    <div
                                        @if ($open) class="flex pointer-events-none opacity-20"
                                        @else 
                                        class="flex" @endif>

                                        <livewire:suppliers.show-supplier :supplier="$supplier" :key="time() . $supplier->id" />
                                        <livewire:suppliers.edit-supplier :supplier="$supplier" :key="time() . $supplier->id" />

                                        <div class="relative inline-block text-center cursor-pointer group">
                                            <a href="#" wire:click="confirmDelete({{ $supplier->id }})">
                                                <i
                                                    class="p-1 text-red-400 rounded hover:text-white hover:bg-red-400 fa-solid fa-trash"></i>
                                                <div
                                                    class="absolute z-10 px-3 py-2 mb-2 text-center text-white bg-gray-700 rounded-lg opacity-0 pointer-events-none text-md group-hover:opacity-80 bottom-full -left-3">
                                                    Eliminar
                                                    <svg class="absolute left-0 w-full h-2 text-black top-full" x="0px"
                                                        y="0px" viewBox="0 0 255 255" xml:space="preserve">
                                                    </svg>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            {{-- Modal de Confirmación de Eliminación de proveedores. --}}
                            @if ($open)
                                <div class="fixed inset-0 z-50 flex items-center justify-center"
                                    wire:click="$set('open', false)">
                                    <div class="absolute inset-0 z-40 bg-black opacity-10 modal-overlay"></div>
                                    <div
                                        class="z-50 w-11/12 mx-auto overflow-y-auto bg-white border border-red-500 rounded-xl modal-container md:max-w-md">

                                        <!-- Contenido del modal -->
                                        <div class="flex gap-3 py-2 bg-red-500 border border-red-500">
                                            <h3 class="w-full text-2xl text-center text-gray-100 ">Eliminar</h3>
                                        </div>
                                        <div class="px-6 py-4 text-left modal-content">

                                            <p class="text-xl text-gray-500">
                                                ¿Estás seguro de que deseas eliminar este proveedor?
                                            </p>
                                            <div class="mt-4 text-center">
                                                <x-secondary-button wire:click="$set('open', false)"
                                                    class="mr-4 text-gray-500 border border-gray-500 shadow-lg hover:text-gray-50 hover:bg-gray-400 hover:shadow-gray-400">
                                                    Cancelar
                                                </x-secondary-button>
                                                <x-secondary-button wire:click="deleteConfirmed"
                                                    class="mr-4 text-red-500 border border-red-500 shadow-lg hover:text-gray-50 hover:bg-red-400 hover:shadow-red-400">
                                                    Eliminar
                                                </x-secondary-button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        @empty
                            <tr>
                                <td colspan="12" class="text-3xl text-center dark:text-gray-200">No hay
                                    proveedores
                                    Disponibles</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
                <div class="px-3 py-1">
                    {{ $suppliers->links() }}
                </div>
            </div>
        </div>
    @else
        <h1 class="mt-64 text-5xl text-center dark:text-gray-200">
            <div>¡Ups!</div><br> <span class="mt-4"> No se encontraron coincidencias en la búsqueda. </span>
        </h1>
    @endif
</div>
