<div class="m-4">
    <input wire:model="search" type="text" placeholder="Buscar por nombre..."
        class="p-2 mb-4 text-gray-800 border border-gray-300 rounded dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200">

    <div class="dark:bg-gray-900">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead>
                    <tr>
                        <th wire:click="sortBy('name')"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-100 cursor-pointer dark:bg-gray-800 dark:text-gray-400">
                            Nombre
                            @if ($sortField === 'name')
                                @if ($sortDirection === 'asc')
                                    <span>&#8593;</span>
                                @else
                                    <span>&#8595;</span>
                                @endif
                            @endif
                        </th>
                        <th wire:click="sortBy('selling_price')"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-100 cursor-pointer dark:bg-gray-800 dark:text-gray-400">
                            Precio de venta
                            @if ($sortField === 'selling_price')
                                @if ($sortDirection === 'asc')
                                    <span>&#8593;</span>
                                @else
                                    <span>&#8595;</span>
                                @endif
                            @endif
                        </th>
                        <th wire:click="sortBy('current_stock')"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-100 cursor-pointer dark:bg-gray-800 dark:text-gray-400">
                            Cantidad
                            @if ($sortField === 'current_stock')
                                @if ($sortDirection === 'asc')
                                    <span>&#8593;</span>
                                @else
                                    <span>&#8595;</span>
                                @endif
                            @endif
                        </th>
                        <th wire:click="sortBy('expiration')"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-100 cursor-pointer dark:bg-gray-800 dark:text-gray-400">
                            F. Vencimiento
                            @if ($sortField === 'expiration')
                                @if ($sortDirection === 'asc')
                                    <span>&#8593;</span>
                                @else
                                    <span>&#8595;</span>
                                @endif
                            @endif
                        </th>
                        <th wire:click="sortBy('status')"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-100 cursor-pointer dark:bg-gray-800 dark:text-gray-400">
                            Estado
                            @if ($sortField === 'status')
                                @if ($sortDirection === 'asc')
                                    <span>&#8593;</span>
                                @else
                                    <span>&#8595;</span>
                                @endif
                            @endif
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    @foreach ($products as $product)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $product->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $product->selling_price }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $product->current_stock }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $product->expiration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $product->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-4 py-2 bg-white border-t border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            {{ $products->links() }}
        </div>
    </div>
</div>
