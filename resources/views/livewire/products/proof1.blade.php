<div>
    <div class="my-4 text-xl font-bold text-center text-blue-400 uppercase bg-gray-100">
        <h1>Productos</h1>
    </div>
    <!-- Verificar si hay productos antes de renderizar la tabla y su encabezado -->
    @if ($products->count() > 0)
        <div>


            <div class="w-1/4 mt-2 rounded-lg">
                <div class="float-right mr-8">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="absolute my-3 cursor-pointer"
                        viewBox="0 0 512 512">
                        <path
                            d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                    </svg>
                </div>
            </div>
            <div class="flex w-full mt-2">
                <div class="w-3/4 ml-4">

                    <!-- Este input de búsqueda puede tener otros modificadores como 'debounce.1s' o 'defer' -->
                    <input type="text" name="search" wire:model.lazy="search"
                        class="w-1/3 mr-4 bg-white border-none rounded-lg focus:ring-gray-400" placeholder="Buscar...">

                    <!-- Filtrar por marca de producto -->
                    <select wire:model="brandFilter"
                        class="mr-4 bg-white border-none rounded-lg shadow-lg cursor-pointer w-1/11 hover:shadow-gray-500 focus:ring-gray-400">
                        <option value="">Marcas</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                    <!-- Filtrar por categoría de producto -->
                    <select wire:model="categoryFilter"
                        class="mr-4 bg-white border-none rounded-lg shadow-lg cursor-pointer w-1/11 hover:shadow-gray-500 focus:ring-gray-400">
                        <option value="">Categorías</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <button wire:click="resetFilters"
                        class="p-2 mr-4 bg-white border-none rounded-lg shadow-lg w-1/11 hover:shadow-gray-500 focus:ring-gray-400">
                        Restablecer
                    </button>
                </div>
                <div class="float-right w-1/4 mr-4">
                    <livewire:products.create-product />
                </div>
            </div>



            <div class="w-1/4 mt-2 rounded-lg">
                <div class="float-right mr-8">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="absolute my-3 cursor-pointer"
                        viewBox="0 0 512 512">
                        <path
                            d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                    </svg>
                </div>
            </div>
            <div class="flex w-full mt-2">
                <div class="w-3/4">
                    <!-- Este input de búsqueda puede tener otros modificadores como 'debounce.1s' o 'defer' -->
                    <input type="text" name="search" wire:model.lazy="search"
                        class="w-2/6 mr-4 bg-white border-none rounded-lg focus:ring-gray-400" placeholder="Buscar...">
                </div>
                <div class="float-right w-1/4 mr-4">
                    <livewire:products.create-product />
                </div>
            </div>

        </div>
        <!-- Filtrar por marca de producto -->
        <select wire:model="brandFilter"
            class="w-32 p-2 mr-4 text-blue-500 bg-white border-none rounded-lg shadow-lg cursor-pointer hover:text-red-700 hover:shadow-gray-500 focus:ring-gray-400">
            <option value="">Marcas</option>
            @foreach ($brands as $brand)
                <option value="{{ $brand->name }}">{{ $brand->name }}</option>
            @endforeach
        </select>
        <!-- Filtrar por categoría de producto -->
        <select wire:model="categoryFilter"
            class="w-32 p-2 mr-4 text-blue-500 bg-white border-none rounded-lg shadow-lg cursor-pointer hover:text-red-700 hover:shadow-gray-500 focus:ring-gray-400">
            <option value="">Categorías</option>
            @foreach ($categories as $category)
                <option value="{{ $category->name }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <button wire:click="resetFilters"
            class="p-2 mr-4 text-blue-500 bg-white border-none rounded-lg shadow-lg hover:text-red-700 hover:shadow-gray-500 focus:ring-gray-400">
            Restablecer
        </button>
</div>
<div class="relative mt-4 overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-center text-gray-100 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 cursor-pointer" wire:click.prevent="order('id')">
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
                <tr
                    class="text-center bg-white border-b text-md dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $product->id }}
                    </th>
                    <td class="px-6 py-4 dark:text-lg">{{ $product->name }}</td>
                    <td class="px-6 py-4 dark:text-lg">{{ $product->description }}</td>
                    <td class="px-6 py-4 dark:text-lg">{{ $product->brand->name }}</td>
                    <td class="px-6 py-4 dark:text-lg">{{ $product->category->name }}</td>
                    <td class="px-6 py-4 dark:text-lg">{{ $product->supplier->name }}</td>
                    <td class="px-6 py-4 ">{{ $product->purchase_price }}</td>
                    <td class="px-6 py-4 ">{{ $product->selling_price }} </td>
                    <td class="px-6 py-4 ">{{ $product->measurement_unit }} </td>
                    @if ($product->status == 'Disponible')
                        <td class="px-6 py-4 text-green-600">{{ $product->status }}</td>
                    @elseif ($product->status == 'Agotado')
                        <td class="px-6 py-4 text-red-600">{{ $product->status }}</td>
                    @else
                        <td class="px-6 py-4 text-blue-600">{{ $product->status }}</td>
                    @endif
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
                    <td colspan="12" class="mt-64 text-5xl text-center dark:text-gray-200">Aún no se han
                        agregado
                        productos.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="px-3 py-1">
        <!-- Número de Registros a mostrar en la paginación -->
        Registros por página
        <input type="number" name="perPage" wire:model="perPage"
            class="w-[70px] mr-4 bg-white border-none rounded-lg focus:ring-gray-400">{{ $products->links() }}
    </div>
</div>
@else
<!-- Mensaje de no hay productos -->
<h1 class="mt-64 text-5xl text-center dark:text-gray-200">
    <div>¡Ups!</div><br> <span class="mt-4"> No se encontraron coincidencias en la búsqueda. </span>
</h1>
@endif
</div>
