<tr
    class="text-center bg-white border-b text-md dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

    <td class="w-4 py-4 pl-8 pr-4">
        <div class="flex items-center">
            <input id="checkbox-table-search-1" type="checkbox"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
        </div>
    </td>
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        {{ $product->id }}
    </th>

    <td class="px-6 py-4 dark:text-lg">{{ $product->name }}</td>
    <td class="px-6 py-4 dark:text-lg">{{ $product->description }}</td>
    <td class="px-6 py-4 dark:text-lg">{{ $product->brand->name }}</td>
    <td class="px-6 py-4 dark:text-lg">{{ $product->category->name }}</td>
    <td class="px-6 py-4 ">{{ $product->purchase_price }}</td>
    <td class="px-6 py-4 ">{{ $product->selling_price }} </td>
    <td class="px-6 py-4 ">{{ $product->created_at }}</td>
    <td class="px-6 py-4 ">{{ $product->updated_at }}</td>
    @if ($product->status == 'Disponible')
        <td class="px-6 py-4 text-green-500">{{ $product->status }}</td>
    @else
        <td class="px-6 py-4 text-red-500">{{ $product->status }}</td>
    @endif


    <td class="flex justify-around py-4 pl-2 pr-8">
        @livewire('show-product', ['product' => $product], key(time() . $product->id))
        @livewire('edit-product', ['product' => $product], key(time() . $product->id))

        <div class="relative inline-block text-center cursor-pointer group">
            <a href="#" wire:click="confirmDelete({{ $product->id }})">
                <i class="p-1 text-red-400 rounded hover:text-white hover:bg-red-400 fa-solid fa-trash"></i>
                <div
                    class="absolute z-10 px-3 py-2 mb-2 text-center text-white bg-gray-700 rounded-lg opacity-0 pointer-events-none text-md group-hover:opacity-80 bottom-full -left-3">
                    Eliminar
                    <svg class="absolute left-0 w-full h-2 text-black top-full" x="0px" y="0px"
                        viewBox="0 0 255 255" xml:space="preserve">
                        <polygon class="fill-current" points="0,0 127.5,127.5 255,0" />
                    </svg>
                </div>
            </a>
        </div>
    </td>
</tr>
