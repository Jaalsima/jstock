<div class="container mx-auto p-6">
    <h2 class="mb-4 text-2xl font-bold">REGISTRO DE VENTAS</h2>

    <div class="flex mb-4">
        <div class="w-1/3 mr-4">
            <label for="customer" class="block font-bold mb-2">Cliente:</label>
            <select wire:model="customerId" id="customer" name="customer"
                class="border border-gray-300 px-3 py-2 w-full rounded">
                <option value="">Seleccionar cliente</option>
                @foreach ($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
            @error('customerId') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="w-1/3 mr-4">
            <label for="invoiceNumber" class="block font-bold mb-2">Número de Factura:</label>
            <input wire:model="invoiceNumber" type="text" id="invoiceNumber" name="invoiceNumber"
                class="border border-gray-300 px-3 py-2 w-full">
            @error('invoiceNumber') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="w-1/3">
            <button wire:click="addProduct"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Agregar Producto
            </button>
        </div>

        <div class="mb-6 overflow-x-auto">
            <table class="w-full border border-collapse border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-2">Producto</th>
                        <th class="p-2">Cantidad</th>
                        <th class="p-2">Precio Unitario</th>
                        <th class="p-2">Subtotal</th>
                        <th class="p-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $index => $product)
                    <tr>
                        <td class="p-2">
                            <select wire:model="products.{{ $index }}.id"
                                class="w-full p-2 border border-gray-300 rounded">
                                <option disabled>-- Selecciona un producto --</option>
                                @foreach ($availableProducts as $availableProduct)
                                <option value="{{ $availableProduct->id }}">{{ $availableProduct->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="p-2">
                            <input type="number" wire:model="products.{{ $index }}.quantity"
                                class="w-full p-2 border border-gray-300 rounded" min="1">
                        </td>
                        <td class="p-2">
                            <input type="nummber" wire:model="products.{{ $index }}.unit_price"
                                class="w-full p-2 border border-gray-300 rounded" readonly>
                        </td>
                        <td class="p-2">
                            <input type="nummber" wire:model="products.{{ $index }}.subtotal"
                                class="w-full p-2 border border-gray-300 rounded" readonly>
                        </td>
                        <td class="p-2">
                            <button wire:click="removeProduct({{ $index }})"
                                class="px-4 py-2 text-white bg-red-500 rounded">Eliminar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if ($selectedSale)
        <x-dialog-modal wire:model="open">
            <x-slot name="title">
                <h2 class="text-2xl text-center font-bold">Detalle de Venta</h2>
            </x-slot>

            <x-slot name="content">
                <div class="p-4">
                    <div class="flex justify-between">
                        <div class="mb-4">
                            <p class="text-lg font-semibold">Cliente:</p>
                            <p>{{ $selectedSale->customer->name }}</p>
                        </div>
                        <div class="mb-4">
                            <p class="text-lg font-semibold">Número de Factura:</p>
                            <p>{{ $selectedSale->invoice_number }}</p>
                        </div>
                    </div>
                    <div class="mb-4">
                        <p class="text-lg font-semibold">Fecha de Venta:</p>
                        <p>{{ $selectedSale->sale_date }}</p>
                    </div>

                    <!-- Lista de Productos -->
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Productos:</h3>
                        <table class="w-full border border-collapse border-gray-300">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="p-2">Producto</th>
                                    <th class="p-2">Cantidad</th>
                                    <th class="p-2">Precio Unitario</th>
                                    <th class="p-2">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($selectedSale->saleDetails as $saleDetail)
                                <tr>
                                    <td class="p-2">{{ $saleDetail->product->name }}</td>
                                    <td class="p-2">{{ $saleDetail->quantity }}</td>
                                    <td class="p-2">${{ number_format($saleDetail->unit_price, 2) }}</td>
                                    <td class="p-2">${{ number_format($saleDetail->subtotal, 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Líneas divisorias -->
                    <div class="border-t my-4"></div>

                    <div class="flex justify-end">
                        <p class="text-lg font-semibold">Total:</p>
                        <p class="text-2xl font-bold text-green-600">${{ number_format($selectedSale->total_amount, 2)
                            }}</p>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <div class="flex justify-end">
                    <x-secondary-button wire:click="closeSaleDetailsModal()"
                        class="px-6 py-3 text-white font-semibold bg-gray-600 rounded shadow-lg hover:text-gray-900 hover:bg-gray-400 hover:shadow-gray-700">
                        Cerrar</x-secondary-button>
                </div>
            </x-slot>
        </x-dialog-modal>
        @endif

        <div class="flex items-center justify-between mb-4">
            <div>
                <h4 class="text-xl font-bold">Total: ${{ number_format($totalAmount, 2) }}</h4>
            </div>
            <div>
                <button wire:click="confirmSale"
                    class="px-6 py-3 text-white font-semibold bg-green-600 rounded shadow-lg hover:text-green-900 hover:bg-green-400 hover:shadow-green-700">Confirmar
                    Venta
                </button>
            </div>
        </div>

        <div class="mt-8">
            <h2 class="mb-4 text-2xl font-bold">Listado de Ventas</h2>
            <table class="w-full border border-collapse border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-2 cursor-pointer" wire:click="sortField('created_at')">Fecha de Venta</th>
                        <th class="p-2">Cliente</th>
                        <th class="p-2">Número de Factura</th>
                        <th class="p-2">Total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($sales as $sale)
                    <tr class="cursor-pointer hover:bg-blue-400" wire:click="showSaleDetails({{ $sale->id }})">
                        <td class="p-2">{{ $sale->sale_date }}</td>
                        <td class="p-2">{{ $sale->customer->name }}</td>
                        <td class="p-2">{{ $sale->invoice_number }}</td>
                        <td class="p-2">{{ number_format($sale->total_amount, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $sales->links() }}

            <x-dialog-modal maxWidth="7xl" wire:model="openConfirmingSale">
                <x-slot name="title">
                    Confirmación registro de venta
                </x-slot>
                <x-slot name="content">
                    <h1>Verifique que los datos son correctos</h1>
                    <div class="flex mb-4">
                        <div class="w-1/3 mr-4">
                            <label for="customerId" class="block mb-1">Cliente</label>
                            <select wire:model="customerId" id="customerId"
                                class="w-full p-2 border border-gray-300 rounded">
                                <option disabled>-- Selecciona un cliente --</option>
                                @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                            @error('customerId')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-1/3 mr-4">
                            <label for="invoiceNumber" class="block mb-1">Número de Factura</label>
                            <input type="text" wire:model="invoiceNumber" id="invoiceNumber"
                                class="w-full p-2 border border-gray-300 rounded">
                            @error('invoiceNumber')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <table class="w-full border border-collapse border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="p-2">Producto</th>
                                <th class="p-2">Cantidad</th>
                                <th class="p-2">Precio Unitario</th>
                                <th class="p-2">Subtotal</th>
                                <th class="p-2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $index => $product)
                            <tr>
                                <td class="p-2">
                                    <select wire:model="products.{{ $index }}.id"
                                        class="w-full p-2 border border-gray-300 rounded">
                                        <option disabled>-- Selecciona un producto --</option>
                                        @foreach ($availableProducts as $availableProduct)
                                        <option value="{{ $availableProduct->id }}">{{ $availableProduct->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="p-2">
                                    <input type="number" wire:model="products.{{ $index }}.quantity"
                                        class="w-full p-2 border border-gray-300 rounded" min="1">
                                </td>
                                <td class="p-2">
                                    <input type="text" wire:model="products.{{ $index }}.unit_price"
                                        class="w-full p-2 border border-gray-300 rounded" readonly>
                                </td>
                                <td class="p-2">
                                    <input type="text" wire:model="products.{{ $index }}.subtotal"
                                        class="w-full p-2 border border-gray-300 rounded" readonly>
                                </td>
                                <td class="p-2">
                                    <button wire:click="removeProduct({{ $index }})"
                                        class="px-4 py-2 text-white bg-red-500 rounded">Eliminar</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </x-slot>
                <x-slot name="footer">
                    <x-secondary-button wire:click="$set('openConfirmingSale', false)"
                        class="px-6 py-3 text-white font-semibold bg-gray-600 rounded shadow-lg hover:text-gray-900 hover:bg-gray-400 hover:shadow-gray-700">
                        Salir</x-secondary-button>
                    <x-secondary-button wire:click="submitSale"
                        class="px-6 py-3 text-white font-semibold bg-green-600 rounded shadow-lg hover:text-green-900 hover:bg-green-400 hover:shadow-green-700">
                        Registrar venta</x-secondary-button>
                </x-slot>
            </x-dialog-modal>


        </div>

    </div>