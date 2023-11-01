<div>
    <div class="md:flex md:justify-between mb-4">
        <div>
            <input wire:model.debounce.300ms="search" type="text" placeholder="Buscar marca..."
                class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300">
        </div>
        <div class="my-4 md:mb-4 md:mt-0">
            <button wire:click="create"
                class="px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-700 focus:outline-none">Nueva Marca</button>
        </div>
        <div class="grid grid-cols-2 gap-4 mt-4 md:block md:mt-0">
            <select wire:model="orderBy"
                class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300">
                <option value="id">ID</option>
                <option value="name">Nombre</option>
                <option value="created_at">Fecha de creación</option>
            </select>
            <select wire:model="orderAsc"
                class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300">
                <option value="1">Ascendente</option>
                <option value="0">Descendente</option>
            </select>
            <select wire:model="perPage"
                class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300">
                <option value="10">10 por página</option>
                <option value="25">25 por página</option>
                <option value="50">50 por página</option>
            </select>
        </div>
    </div>
    <div class="overflow-x-auto hidden md:block">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Descripción</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($brands as $brand)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $brand->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $brand->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $brand->description }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $brand->status }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button wire:click="show({{ $brand->id }})"
                            class="text-blue-600 hover:text-blue-900">Ver</button>
                        <button wire:click="edit({{ $brand->id }})"
                            class="text-blue-600 hover:text-blue-900">Editar</button>
                        <button wire:click="delete({{ $brand->id }})"
                            class="text-red-600 hover:text-red-900">Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="overflow-x-auto block md:hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($brands as $brand)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $brand->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $brand->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button wire:click="show({{ $brand->id }})"
                            class="text-blue-600 hover:text-blue-900">Ver</button>
                        <button wire:click="edit({{ $brand->id }})"
                            class="text-blue-600 hover:text-blue-900">Editar</button>
                        <button wire:click="delete({{ $brand->id }})"
                            class="text-red-600 hover:text-red-900">Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $brands->links() }}
    </div>
    @if ($modalMode === 'create' || $modalMode === 'edit' || $modalMode === 'show')
    <div class="fixed inset-0 flex items-center justify-center z-50">
        <div class="bg-white rounded shadow-lg p-4 max-w-2xl">
            <div class="flex justify-between mb-4">
                <h2 class="text-xl font-bold">
                    @if ($modalMode === 'create')
                    Crear Marca
                    @elseif ($modalMode === 'edit')
                    Editar Marca
                    @else
                    Detalles de la Marca
                    @endif
                </h2>
                <button wire:click="closeModal" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <form wire:submit.prevent="{{ $modalMode === 'create' ? 'store' : 'update' }}">
                <div class="mb-4">
                    <label for="brand-name" class="block text-gray-700 font-bold mb-2">Nombre:</label>
                    <input wire:model.defer="brand.name" type="text" id="brand-name"
                        class="border border-gray-300 rounded px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-300">
                    @error('brand.name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="brand-description" class="block text-gray-700 font-bold mb-2">Descripción:</label>
                    <textarea wire:model.defer="brand.description" id="brand-description" rows="4"
                        class="border border-gray-300 rounded px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-300"></textarea>
                    @error('brand.description') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="brand-status" class="block text-gray-700 font-bold mb-2">Estado:</label>
                    <input wire:model.defer="brand.status" type="text" id="brand-status"
                        class="border border-gray-300 rounded px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-300">
                    @error('brand.status') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="flex justify-end">
                    @if ($modalMode === 'show')
                    <button type="button" wire:click="closeModal"
                        class="px-4 py-2 rounded text-gray-500 hover:text-gray-700 focus:outline-none">Cerrar</button>
                    @else
                    <button type="submit"
                        class="px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-700 focus:outline-none">Guardar</button>
                    <button type="button" wire:click="closeModal"
                        class="px-4 py-2 rounded text-gray-500 hover:text-gray-700 focus:outline-none">Cancelar</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
    @endif
</div>
