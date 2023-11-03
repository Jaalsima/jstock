<div>
    <!-- Verificar si hay productos antes de renderizar la tabla y su encabezado -->
    @if ($products->count() > 0)
        <div>
            <div class="grid items-center w-full md:grid-cols-12 mt-2">
                <div class="col-span-4">
                    <input type="text" name="search" wire:model="search"
                        class="w-full bg-white dark:bg-gray-800 dark:text-gray-100 border-none rounded-lg focus:ring-gray-400" placeholder="Buscar...">
                </div>
                <div class="inline mt-4 pl-4 pr-16 md:pl-0 md:pr-0 md:mt-0 md:block md:col-span-4">
                    <div class="text-xl font-bold text-center text-blue-400 uppercase">
                        <h1 class="text-red-800 dark:text-red-700">Pr<span class="text-gray-800 dark:text-gray-400">oductos</span></h1>
                    </div>
                </div>
                <div class="inline mt-4 md:mt-0 md:block md:col-span-4">
                    <livewire:products.create-product />
                </div>
            </div>
            <div class="py-4 ml-4 text-gray-500 dark:text-gray-100">
                Registros por página
                <input type="number" name="perPage" wire:model="perPage"
                    class="w-[70px] dark:bg-gray-800 pr-2 py-1 cursor-pointer bg-white border-none rounded-lg focus:ring-gray-400">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4 md:block">
            <!-- Filtrar por la marca de producto -->
            <select wire:model="brandFilter"
                class="md:w-32 p-2 mr-4 dark:bg-gray-800 dark:text-gray-100 text-blue-500 bg-white border-none rounded-lg shadow-lg cursor-pointer hover:text-red-700 hover:shadow-gray-500 focus:ring-gray-400">
                <option value="">Marcas</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                @endforeach
            </select>
            <!-- Filtrar por la categoría de producto -->
            <select wire:model="categoryFilter"
                class="md:w-32 p-2 mr-4 dark:bg-gray-800 dark:text-gray-100 text-blue-500 bg-white border-none rounded-lg shadow-lg cursor-pointer hover:text-red-700 hover:shadow-gray-500 focus:ring-gray-400">
                <option value="">Categorías</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button wire:click="resetFilters"
                class="p-2 mr-4 text-blue-500 dark:bg-gray-800 dark:text-gray-100 bg-white border-none rounded-lg shadow-lg hover:text-red-700 hover:shadow-gray-500 focus:ring-gray-400">
                Restablecer
            </button>
        </div>

        <div class="relative hidden md:block mt-4 shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead
                    class="text-xs text-center text-gray-100 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
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

                        <th scope="col" class="px-1 py-3 cursor-pointer" wire:click.prevent="order('description')">
                            Descripción
                            @if ($sort == 'description')
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
                            Marca
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Categoría
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Proveedor
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Precio de Compra
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Precio de Venta
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Unidad Medida
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
                    @forelse ($products as $product)
                        <div class="hidden">
                            @if ($product->status === 'Disponible')
                                {{ $colorStatus = 'text-green-600' }}
                            @elseif ($product->status === 'No Disponible')
                                {{ $colorStatus = 'text-gray-500' }}
                            @elseif ($product->status === 'Agotado')
                                {{ $colorStatus = 'text-orange-600' }}
                            @elseif ($product->status === 'Expirable')
                                {{ $colorStatus = 'text-yellow-600' }}
                            @elseif ($product->status === 'Vencido')
                                {{ $colorStatus = 'text-red-600' }}
                            @endif
                        </div>
                        <tr
                            class="text-center bg-white border-b text-md dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            {{-- <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $product->id }}
                            </th> --}}
                            <td class="px-6 py-4 dark:text-lg">{{ $product->name }}</td>
                            <td class="px-6 py-4 dark:text-lg">{{ $product->description }}</td>
                            <td class="px-6 py-4 dark:text-lg">{{ $product->brand->name }}</td>
                            <td class="px-6 py-4 dark:text-lg">{{ $product->category->name }}</td>
                            <td class="px-6 py-4 dark:text-lg">{{ $product->supplier->name }}</td>
                            <td class="px-6 py-4 ">{{ $product->purchase_price }}</td>
                            <td class="px-6 py-4 ">{{ $product->selling_price }} </td>
                            <td class="px-6 py-4 ">{{ $product->measurement_unit }} </td>
                            <td class="px-6 py-4 dark:text-lg {{ $colorStatus }}">{{ $product->status }}</td>
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
                        <!-- Mensaje de no hay productos -->
                        <tr>
                            <td colspan="12" class="mt-64 text-5xl text-center dark:text-gray-200">
                                Aún no se han agregado productos.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="px-3 py-1">
                {{ $products->links() }}
            </div>
        </div>
        <div class="relative block md:hidden mt-4 overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead
                    class="text-xs text-center text-gray-100 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
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
                        <th scope="col" class="px-6 py-3">
                            Precio de Venta
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
                            <td class="px-6 py-4 dark:text-lg">{{ $product->name }}</td>
                            <td class="px-6 py-4 ">{{ $product->selling_price }} </td>
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
                            <td colspan="12" class="mt-64 text-5xl text-center dark:text-gray-200">
                                Aún no se han agregado productos.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="px-3 py-1">
                {{ $products->links() }}
            </div>
        </div>
    @else
        <!-- Mensaje de no hay productos -->
        <h1 class="my-64 text-5xl text-center dark:text-gray-200">
            <div>¡Ups!</div><br> <span class="mt-4"> No se encontraron coincidencias en la búsqueda. </span>
        </h1>
        <div class="flex justify-center w-full h-auto">
            <button
                class="px-8 py-3 mx-auto text-2xl text-blue-500 bg-blue-200 border-2 border-blue-400 rounded-md shadow-md hover:border-blue-500 hover:shadow-blue-400 hover:text-gray-100 hover:bg-blue-300">
                <a href="{{ route('index-product') }}">Volver</a>
            </button>
        </div>
    @endif
</div>
