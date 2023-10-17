<div class="overflow-y-auto">
    <div class="my-4 text-xl font-bold text-center text-blue-400 uppercase bg-gray-100">
        <h1>Inventario</h1>
    </div>

    @if ($products->count() > 0)
        <div>
            <div class="flex w-full mt-2">
                <div class="w-3/4">
                    <input type="text" name="search" wire:model.lazy="search"
                        class="w-1/3 mr-4 bg-white border-none rounded-lg focus:ring-gray-400" placeholder="Buscar...">
                </div>
                <div class="float-right w-1/4 mr-4">
                    <livewire:products.create-product />
                </div>
            </div>
            <button
                class="p-2 mr-4 text-blue-500 bg-white border-none rounded-lg shadow-lg hover:text-red-700 hover:shadow-gray-500 focus:ring-gray-400">
                Generar Reporte
            </button>
            <div class="relative mt-4 overflow-x-hidden shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead
                        class="text-xs text-center text-gray-100 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-1 py-4 cursor-pointer" wire:click.prevent="order('id')">
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
                            <th scope="col" class="px-6 py-3 cursor-pointer" wire:click.prevent="order('name')">
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

                            <th scope="col" class="px-6 py-3 cursor-pointer"
                                wire:click.prevent="order('current_stock')">
                                Cantidad
                                @if ($sort == 'current_stock')
                                    @if ($direction == 'asc')
                                        <i class="ml-2 fa-solid fa-arrow-up-z-a"></i>
                                    @else
                                        <i class="ml-2 fa-solid fa-arrow-down-z-a"></i>
                                    @endif
                                @else
                                    <i class="ml-2 fa-solid fa-sort"></i>
                                @endif
                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer" wire:click.prevent="order('min_stock')">
                                Mínimo
                                @if ($sort == 'min_stock')
                                    @if ($direction == 'asc')
                                        <i class="ml-2 fa-solid fa-arrow-up-z-a"></i>
                                    @else
                                        <i class="ml-2 fa-solid fa-arrow-down-z-a"></i>
                                    @endif
                                @else
                                    <i class="ml-2 fa-solid fa-sort"></i>
                                @endif
                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer" wire:click.prevent="order('max_stock')">
                                Máximo
                                @if ($sort == 'max_stock')
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
                                Precio de Compra
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Precio de Venta
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Estado
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Fecha de Registro
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Fecha de Caducidad
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr
                                class="text-center bg-white border-b text-md dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $product->id }}
                                </th>
                                <td class="px-6 py-4 dark:text-lg">{{ $product->name }}</td>
                                <td class="px-6 py-4 dark:text-lg">{{ $product->current_stock }}</td>
                                <td class="px-6 py-4 dark:text-lg">{{ $product->min_stock }}</td>
                                <td class="px-6 py-4 dark:text-lg">{{ $product->max_stock }}</td>
                                <td class="px-6 py-4 ">{{ $product->purchase_price }}</td>
                                <td class="px-6 py-4 ">{{ $product->selling_price }} </td>
                                @if ($product->status == 'Disponible')
                                    <td class="px-6 py-4 text-green-600">{{ $product->status }}</td>
                                @elseif ($product->status == 'Agotado')
                                    <td class="px-6 py-4 text-red-600">{{ $product->status }}</td>
                                @else
                                    <td class="px-6 py-4 text-blue-600">{{ $product->status }}</td>
                                @endif
                                <td class="px-6 py-4 dark:text-lg">{{ $product->created_at }}</td>
                                <td class="px-6 py-4 dark:text-lg">{{ $product->expiration }}</td>
                                <td class="flex justify-around py-4 pl-2 pr-8">
                                    <div
                                        @if ($open) class="flex pointer-events-none opacity-20" @else class="flex" @endif>
                                        <livewire:products.show-product :product="$product" :key="time() . $product->id" />
                                        <livewire:products.edit-product :product="$product" :key="time() . $product->id" />
                                        <livewire:products.delete-product :product="$product" :key="time() . $product->id" />
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="mt-64 text-5xl text-center dark:text-gray-200">No se
                                    encontraron productos.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="px-3 py-1">
                    Registros por página
                    <input type="number" name="perPage" wire:model="perPage"
                        class="w-[70px] mr-4 bg-white border-none rounded-lg focus:ring-gray-400">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    @else
        <h1>No se encontraron productos.</h1>
    @endif
</div>
