<!-- resources/views/livewire/suppliers/index-supplier.blade.php -->

<div>
    <div>
        <div class="w-1/4 mt-4 rounded-lg">
            <div class="float-right mr-8">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="absolute my-3 cursor-pointer"
                    viewBox="0 0 512 512">
                    <path
                        d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                </svg>
            </div>
        </div>

        <div class="flex">
            <!-- Este input de búsqueda puede tener otros modificadores como 'debounce.1s' o 'defer' -->
            <input type="text" wire:model.lazy="search"
                class="w-1/4 mr-4 bg-white border-none rounded-lg focus:ring-gray-400" placeholder="Buscar...">
            <livewire:suppliers.create-supplier />

        </div>
    </div>
    <div class="relative mt-4 overflow-x-auto shadow-md sm:rounded-lg">

        <!-- Comprueba si hay proveedores antes de renderizar la tabla y su encabezado -->
        @if ($suppliers->count() > 0)
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead
                    class="text-sm text-center text-gray-100 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-4 pl-8 pr-4">
                            <div class="flex items-center">
                                <input id="checkbox-all-search" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th>
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
                        <th scope="col" class="px-6 py-3">
                            Correo Electrónico
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Dirección
                        </th>
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
                        <tr
                            class="text-center bg-white border-b text-md dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 py-4 pl-8 pr-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $supplier->id }}
                            </th>
                            <td class="px-6 py-4 dark:text-lg">{{ $supplier->name }}</td>
                            <td class="px-6 py-4 dark:text-lg">{{ $supplier->email }}</td>
                            <td class="px-6 py-4 dark:text-lg">{{ $supplier->address }}</td>
                            <td class="px-6 py-4 dark:text-lg">{{ $supplier->phone }}</td>
                            @if ($supplier->status == 'Activo')
                                <td class="px-6 py-4 text-green-600">{{ $supplier->status }}</td>
                            @else
                                @if ($supplier->status == 'Inactivo')
                                    <td class="px-6 py-4 text-red-600">{{ $supplier->status }}</td>
                                @else
                                    <!-- Puedes agregar aquí un tercer estado para los proveedores si es necesario -->
                                    <td class="px-6 py-4 text-blue-600">{{ $supplier->status }}</td>
                                @endif
                            @endif

                            <!-- Agrega aquí otras columnas para mostrar la información de tus proveedores -->
                            <td class="flex justify-around py-4 pl-2 pr-8">
                                <div
                                    @if ($open) class="flex pointer-events-none opacity-20" @else class="flex" @endif>

                                    <livewire:suppliers.show-supplier :supplier="$supplier" :key="time() . $supplier->id" />
                                    <livewire:suppliers.edit-supplier :supplier="$supplier" :key="time() . $supplier->id" />

                                    <div class="relative inline-block text-center cursor-pointer">
                                        <a href="#" wire:click="confirmDelete({{ $supplier->id }})">
                                            <i
                                                class="p-1 text-red-400 rounded hover:text-white hover:bg-red-400 fa-solid fa-trash"></i>
                                            <div
                                                class="absolute z-10 px-3 py-2 mb-2 text-center text-white bg-gray-700 rounded-lg opacity-0 pointer-events-none text-md group-hover:opacity-80 bottom-full -left-3">
                                                Eliminar
                                                <svg class="absolute left-0 w-full h-2 text-black top-full"
                                                    x="0px" y="0px" viewBox="0 0 255 255"
                                                    xml:space="preserve">
                                                    <polygon class="fill-current" points="0,0 127.5,127.5 255,0" />
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @if ($open)
                            <div class="fixed inset-0 flex items-center justify-center"
                                wire:click="$set('open', false)">
                                <div class="absolute inset-0 z-40 bg-black opacity-10 modal-overlay"></div>
                                <div
                                    class="z-50 w-11/12 mx-auto overflow-y-auto bg-white border border-red-500 rounded-xl modal-container md:max-w-md">
                                    <!-- Contenido del modal -->
                                    <div class="flex gap-3 py-2 bg-red-500 border border-red-500">
                                        <h3 class="w-full text-2xl text-center text-gray-100 ">Eliminar</h3>
                                    </div>
                                    <div class="px-6 py-4 text-left modal-content">
                                        <p class="text-xl text-gray-500">¿Estás seguro de que deseas eliminar este
                                            proveedor?</p>
                                        <div class="mt-4 text-center">
                                            <x-secondary-button wire:click="$set('open', false)"
                                                class="mr-4 text-gray-500 border border-gray-500 shadow-lg hover:shadow-gray-400">
                                                Cancelar
                                            </x-secondary-button>
                                            <x-secondary-button wire:click="deleteConfirmed"
                                                class="mr-4 text-red-500 border border-red-500 shadow-lg hover:shadow-red-400">
                                                Eliminar
                                            </x-secondary-button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                        <!-- Mensaje de no hay proveedores -->
                        <tr>
                            <td colspan="4" class="text-3xl text-center dark:text-gray-200">No hay proveedores
                                disponibles</td>
                        </tr>
                    @endforelse
                @else
                    <!-- Mensaje de no hay proveedores -->
                    <h1 class="text-3xl text-center dark:text-gray-200">No hay proveedores disponibles</h1>
        @endif
        </tbody>
        </table>
        <div class="px-3 py-1">{{ $suppliers->links() }}</div>
    </div>
</div>
</div>
