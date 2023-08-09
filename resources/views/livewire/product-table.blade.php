<div>
    <div>
        <div class="w-1/4 mt-4 rounded-lg">

            <div class="float-right mr-8">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="absolute my-3 cursor-pointer"
                    viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path
                        d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                </svg>
            </div>
        </div>


        <div class="flex ml-4">
            <input type="text" wire:model="search"
                class="w-1/4 mr-4 bg-white border-none rounded-lg focus:ring-gray-400" placeholder="Buscar...">
            <livewire:create-product />
        </div>
    </div>
    <div class="relative mt-4 overflow-x-auto shadow-md sm:rounded-lg">

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-sm text-center text-gray-100 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
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
                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('description')">
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
                        Precio de Compra
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio de Venta
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Creado en
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actualizado en
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

                        <td class="w-4 py-4 pl-8 pr-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-1" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $product->id }}
                        </th>

                        <td class="px-6 py-4 text-lg hover:text-blue-400">
                            <a href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
                        </td>
                        <td class="px-6 py-4">{{ $product->description }}</td>
                        <td class="px-6 py-4"> {{ $product->brand->name }}</td>
                        <td class="px-6 py-4">
                            {{ $product->category->name }}</td>
                        <td class="px-6 py-4">
                            {{ $product->purchase_price }}</td>
                        <td class="px-6 py-4">
                            {{ $product->selling_price }} </td>
                        <td class="px-6 py-4">
                            {{ $product->created_at }}</td>
                        <td class="px-6 py-4">
                            {{ $product->updated_at }}</td>
                        <td class="px-6 py-4">
                            {{ $product->status }}</td>
                        <td class="flex justify-around py-4 pl-2 pr-8">

                            @livewire('show-product', ['product' => $product], key($product->id) )
                            @livewire('edit-product', ['product' => $product], key($product->id) )
                            
                            <div class="relative inline-block text-center cursor-pointer group">
                                <i class="fa-solid fa-trash"></i>
                                <div class="absolute z-10 px-3 py-2 mb-2 text-center text-white bg-gray-700 rounded-lg opacity-0 pointer-events-none text-md group-hover:opacity-80 bottom-full -left-8">
                                    Eliminar
                                    <svg class="absolute left-0 w-full h-2 text-black top-full" x="0px"
                                        y="0px" viewBox="0 0 255 255" xml:space="preserve">
                                        <polygon class="fill-current" points="0,0 127.5,127.5 255,0" />
                                    </svg>    
                                </div>
                                <!-- Formulario oculto para eliminar el producto -->
                                <form action="{{ route('products.destroy', $product) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
            </tbody>
        @empty
            <h1>No hay productos disponibles</h1>
            @endforelse
        </table>
        {{ $products->links() }}
    </div>
</div>
</div>
