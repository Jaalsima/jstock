<div class="container md:p-6 mx-auto dark:text-gray-100">
    <h2 class="mb-4 text-xl md:text-2xl font-bold">REGISTRO DE VENTAS</h2>

    <div class="md:flex mb-4">
        <div class="mb-3 md:mb-0 md:w-1/3 md:mr-4">
            <label for="customer" class="block mb-1 font-bold">Cliente:</label>
            <select wire:model="customerId" id="customer" name="customer"
                class="dark:bg-gray-800 dark:text-gray-100 dark:border-gray-700 focus:ring-0 focus:border-red-700 w-full p-2 border border-gray-300 rounded">
                <option hidden>-- Seleccionar cliente --</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
            @error('customerId')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="md:w-1/3 md:mr-4">
            <label for="invoiceNumber" class="block mb-1">Número de Factura:</label>
            <input wire:model="invoiceNumber" type="text" id="invoiceNumber" name="invoiceNumber"
                class="dark:bg-gray-800 dark:text-gray-100 dark:border-gray-700 focus:ring-0 focus:border-red-700 w-full p-2 border border-gray-300 rounded">
            @error('invoiceNumber')
                <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-center md:block md:w-1/3">
            <button wire:click="addProduct"
                class="dark:bg-gray-800 px-4 py-2 mt-7 font-semibold text-white bg-blue-600 rounded shadow-lg hover:text-blue-900 hover:bg-blue-400 hover:shadow-blue-700">
                Agregar Producto
            </button>
        </div>
    </div>

    <div class="mb-6 hidden md:block overflow-x-auto">
        <table class="w-full border border-collapse border-gray-300 dark:border-gray-600">
            <thead>
                <tr class="dark:bg-gray-800 bg-gray-200 dark:text-gray-100">
                    <th class="p-2">Producto</th>
                    <th class="p-2">Cantidad</th>
                    <th class="p-2">Precio Unitario</th>
                    <th class="p-2">Subtotal</th>
                    <th class="p-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $index => $product)
                    <tr class="dark:bg-gray-600">
                        <td class="p-2">
                            <select wire:model="products.{{ $index }}.id"
                                class="dark:bg-gray-800 dark:text-gray-100 dark:border-gray-700 focus:ring-0 focus:border-red-700 w-full p-2 border border-gray-300 rounded">
                                <option hidden>-- Selecciona un producto --</option>
                                @foreach ($allProducts as $myProduct)
                                    <option value="{{ $myProduct->id }}">{{ $myProduct->name }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td class="p-2">
                            <input type="number" wire:model="products.{{ $index }}.quantity"
                                class="dark:bg-gray-800 dark:text-gray-100 dark:border-gray-700 focus:ring-0 focus:border-red-700 w-full p-2 border border-gray-300 rounded" min="1"
                                @if (empty($product['id'])) disabled @endif>
                        </td>
                        <td class="p-2">
                            <input type="nummber" wire:model="products.{{ $index }}.unit_price"
                                class="dark:bg-gray-800 dark:text-gray-100 dark:border-gray-700 focus:ring-0 focus:border-red-700 w-full p-2 border border-gray-300 rounded" readonly>
                        </td>
                        <td class="p-2">
                            <input type="nummber" wire:model="products.{{ $index }}.subtotal"
                                class="dark:bg-gray-800 dark:text-gray-100 dark:border-gray-700 focus:ring-0 focus:border-red-700 w-full p-2 border border-gray-300 rounded" readonly>
                        </td>
                        <td class="p-2">
                            <x-secondary-button wire:click="removeProduct({{ $index }})"
                                class="dark:bg-gray-800 px-6 py-3 font-semibold text-white bg-red-600 border-red-500 rounded shadow-lg hover:text-red-900 hover:bg-red-400 hover:shadow-red-700">Eliminar</x-secondary-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @foreach ($products as $index => $product)
        <div class="md:hidden grid grid-cols-3 gap-1 bg-gray-100 bg-opacity-80 p-1 mb-4">
            <div class="col-span-1 h-auto grid grid-cols-1">
                <div class="bg-white pl-1 flex items-center rounded-l mb-1">Producto</div>
                <div class="bg-white pl-1 flex items-center rounded-l mb-1">Cantidad</div>
                <div class="bg-white pl-1 flex items-center rounded-l mb-1">Precio Unitario</div>
                <div class="bg-white pl-1 flex items-center rounded-l">Subtotal</div>
            </div>
            <div class="col-span-2">
                <div>
                    <select wire:model="products.{{ $index }}.id"
                        class="w-full p-2 border border-gray-300 rounded">
                        <option hidden>-- Selecciona un producto --</option>
                        @foreach ($allProducts as $myProduct)
                            <option value="{{ $myProduct->id }}">{{ $myProduct->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <input type="number" wire:model="products.{{ $index }}.quantity"
                        class="w-full p-2 border border-gray-300 rounded" min="1"
                        @if (empty($product['id'])) disabled @endif>
                </div>
                <div>
                    <input type="nummber" wire:model="products.{{ $index }}.unit_price"
                        class="w-full p-2 border border-gray-300 rounded" readonly>
                </div>
                <div>
                    <input type="nummber" wire:model="products.{{ $index }}.subtotal"
                        class="w-full p-2 border border-gray-300 rounded" readonly>
                </div>
            </div>
            <div>
                <x-secondary-button wire:click="removeProduct({{ $index }})"
                    class="px-6 py-3 font-semibold text-white bg-red-600 border-red-500 rounded shadow-lg hover:text-red-900 hover:bg-red-400 hover:shadow-red-700">Eliminar</x-secondary-button>
            </div>
        </div>
    @endforeach

    @if ($selectedSale)
        <x-dialog-modal wire:model="open">
            <x-slot name="title">
                <h2 class="text-2xl font-bold text-center">Detalle de Venta</h2>
            </x-slot>

            <x-slot name="content">
                <div class="md:p-4 dark:text-gray-100">
                    <div class="md:flex justify-between">
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
                    <div class="hidden md:block">
                        <h3 class="mb-2 text-lg font-semibold">Productos:</h3>
                        <table class="w-full border border-collapse border-gray-300 dark:bg-gray-600">
                            <thead>
                                <tr class="bg-gray-200 dark:bg-gray-800 dark:text-gray-100">
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
                    @foreach ($selectedSale->saleDetails as $saleDetail)
                        <div class="md:hidden grid grid-cols-3 gap-1 bg-gray-100 bg-opacity-80 p-1 mb-4">
                            <div class="col-span-1 h-auto grid grid-cols-1">
                                <div class="bg-white dark:bg-gray-800 dark:text-gray-100 pl-1 flex items-center rounded-l mb-1">Producto</div>
                                <div class="bg-white dark:bg-gray-800 dark:text-gray-100 pl-1 flex items-center rounded-l mb-1">Cantidad</div>
                                <div class="bg-white dark:bg-gray-800 dark:text-gray-100 pl-1 flex items-center rounded-l mb-1">Precio Unitario</div>
                                <div class="bg-white dark:bg-gray-800 dark:text-gray-100 pl-1 flex items-center rounded-l">Subtotal</div>
                            </div>
                            <div class="col-span-2">
                                <div class="w-full bg-white dark:bg-gray-800 dark:text-gray-100 p-2 mb-1 border border-gray-300 rounded">
                                    {{ $saleDetail->product->name }}
                                </div>
                                <div class="w-full bg-white dark:bg-gray-800 dark:text-gray-100 p-2 mb-1 border border-gray-300 rounded">
                                    {{ $saleDetail->quantity }}
                                </div>
                                <div class="w-full bg-white dark:bg-gray-800 dark:text-gray-100 p-2 mb-1 border border-gray-300 rounded">
                                    ${{ number_format($saleDetail->unit_price, 2) }}
                                </div>
                                <div class="w-full bg-white dark:bg-gray-800 dark:text-gray-100 p-2 border border-gray-300 rounded">
                                    ${{ number_format($saleDetail->subtotal, 2) }}
                                </div>
                            </div>
                        </div>
                    @endforeach


                    <!-- Líneas divisorias -->
                    <div class="my-4 border-t"></div>

                    <div class="flex justify-end">
                        <p class="text-lg font-semibold">Total:</p>
                        <p class="text-2xl font-bold text-green-600">
                            ${{ number_format($selectedSale->total_amount, 2) }}</p>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <div class="flex justify-end">
                    <x-secondary-button wire:click="closeSaleDetailsModal()"
                        class="px-6 py-3 font-semibold text-white bg-gray-600 rounded shadow-lg hover:text-gray-900 hover:bg-gray-400 hover:shadow-gray-700">
                        Cerrar</x-secondary-button>
                </div>
            </x-slot>
        </x-dialog-modal>
    @endif

    <div class="md:flex items-center justify-between mb-4">
        <div class="pt-4 md:pt-0">
            <h4 class="text-xl font-bold">Total: ${{ number_format($totalAmount, 2) }}</h4>
        </div>
        @if (session('error'))
            <p class="text-red-500">{{ session('error') }}</p>
        @endif
        <div>
            <button wire:click="confirmSale"
                class="mt-10 md:mt-0 w-full px-6 py-3 font-semibold text-white bg-green-600 rounded shadow-lg hover:text-green-900 hover:bg-green-400 hover:shadow-green-700">Confirmar
                Venta
            </button>
        </div>
    </div>

    <div class="mt-8">
        <h2 class="mb-4 text-2xl font-bold">Listado de Ventas</h2>
        <div class="hidden md:block">
            <table class="w-full border border-collapse border-gray-300 dark:border-gray-600">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-800">
                        <th class="p-2 cursor-pointer" wire:click="sortField('created_at')">Fecha de Venta</th>
                        <th class="p-2">Cliente</th>
                        <th class="p-2">Número de Factura</th>
                        <th class="p-2">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                        <tr class="cursor-pointer hover:bg-blue-400 dark:bg-gray-600"
                            wire:click="showSaleDetails({{ $sale->id }})">
                            <td class="p-2">{{ $sale->sale_date }}</td>
                            <td class="p-2">{{ $sale->customer->name }}</td>
                            <td class="p-2">{{ $sale->invoice_number }}</td>
                            <td class="p-2">{{ number_format($sale->total_amount, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="md:hidden">
            <table class="w-full border border-collapse border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-2 cursor-pointer" wire:click="sortField('created_at')">Fecha de Venta</th>
                        <th class="p-2">Cliente</th>
                        <th class="p-2">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                        <tr class="cursor-pointer hover:bg-blue-400"
                            wire:click="showSaleDetails({{ $sale->id }})">
                            <td class="p-2">{{ $sale->sale_date }}</td>
                            <td class="p-2">{{ $sale->customer->name }}</td>
                            <td class="p-2">{{ number_format($sale->total_amount, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $sales->links() }}

        <x-dialog-modal maxWidth="4xl" wire:model="openConfirmingSale">
            <x-slot name="title">
                <h1 class="my-10 text-3xl font-bold text-center">Confirmación Registro de Venta</h1>
            </x-slot>
            <x-slot name="content">
                <h2 class="mb-10 text-xl font-semibold text-center">Por favor verifique que todos los datos sean
                    correctos antes de registar la venta.</h2>
                <div class="flex mb-4">
                    <div class="w-1/3 mr-4">
                        <label for="customerId" class="block mb-1">Cliente</label>
                        <select disabled wire:model="customerId" id="customerId"
                            class="dark:bg-gray-800 dark:text-gray-100 dark:border-gray-700 w-full p-2 border border-gray-300 rounded">
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-1/3 mr-4">
                        <label for="invoiceNumber" class="block mb-1">Número de Factura</label>
                        <input type="text" disabled wire:model="invoiceNumber" id="invoiceNumber"
                            class="dark:bg-gray-800 dark:text-gray-100 dark:border-gray-700 w-full p-2 border border-gray-300 rounded">
                    </div>
                </div>
                <div class="hidden md:block">
                    <table class="w-full border border-collapse border-gray-300 dark:border-gray-600">
                        <thead>
                            <tr class="bg-gray-200 dark:bg-gray-800">
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
                                        <select disabled wire:model="products.{{ $index }}.id"
                                            class="dark:bg-gray-800 dark:text-gray-100 dark:border-gray-700 w-full p-2 border border-gray-300 rounded">
                                            @foreach ($allProducts as $myProduct)
                                                <option value="{{ $myProduct->id }}">
                                                    {{ $myProduct->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="p-2">
                                        <input disabled type="number"
                                            wire:model="products.{{ $index }}.quantity"
                                            class="dark:bg-gray-800 dark:text-gray-100 dark:border-gray-700 w-full p-2 border border-gray-300 rounded" min="1">
                                    </td>
                                    <td class="p-2">
                                        <input disabled type="text"
                                            wire:model="products.{{ $index }}.unit_price"
                                            class="dark:bg-gray-800 dark:text-gray-100 dark:border-gray-700 w-full p-2 border border-gray-300 rounded" readonly>
                                    </td>
                                    <td class="p-2">
                                        <input disabled type="text"
                                            wire:model="products.{{ $index }}.subtotal"
                                            class="dark:bg-gray-800 dark:text-gray-100 dark:border-gray-700 w-full p-2 border border-gray-300 rounded" readonly>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @foreach ($products as $index => $product)
                    <div class="md:hidden grid grid-cols-3 gap-1 bg-gray-100 bg-opacity-80 p-1 mb-4">
                        <div class="col-span-1 h-auto grid grid-cols-1">
                            <div class="bg-white pl-1 flex items-center rounded-l mb-1">Producto</div>
                            <div class="bg-white pl-1 flex items-center rounded-l mb-1">Cantidad</div>
                            <div class="bg-white pl-1 flex items-center rounded-l mb-1">Precio Unitario</div>
                            <div class="bg-white pl-1 flex items-center rounded-l">Subtotal</div>
                        </div>
                        <div class="col-span-2">
                            <div>
                                <select disabled wire:model="products.{{ $index }}.id"
                                    class="dark:bg-gray-800 dark:text-gray-100 dark:border-gray-700 w-full p-2 border border-gray-300 rounded">
                                    @foreach ($allProducts as $myProduct)
                                        <option value="{{ $myProduct->id }}">
                                            {{ $myProduct->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <input disabled type="number" wire:model="products.{{ $index }}.quantity"
                                    class="dark:bg-gray-800 dark:text-gray-100 dark:border-gray-700 w-full p-2 border border-gray-300 rounded" min="1">
                            </div>
                            <div>
                                <input disabled type="text" wire:model="products.{{ $index }}.unit_price"
                                    class="dark:bg-gray-800 dark:text-gray-100 dark:border-gray-700 w-full p-2 border border-gray-300 rounded" readonly>
                            </div>
                            <div>
                                <input disabled type="text" wire:model="products.{{ $index }}.subtotal"
                                    class="dark:bg-gray-800 dark:text-gray-100 dark:border-gray-700 w-full p-2 border border-gray-300 rounded" readonly>
                            </div>
                        </div>
                    </div>
                @endforeach
            </x-slot>
            <x-slot name="footer">
                <div class="flex justify-between w-full px-4">
                    <x-secondary-button wire:click="$set('openConfirmingSale', false)"
                        class="px-6 py-3 font-semibold text-white bg-gray-600 rounded shadow-lg hover:text-gray-900 hover:bg-gray-400 hover:shadow-gray-700">
                        Modificar Registro</x-secondary-button>
                    <x-secondary-button wire:click="submitSale"
                        class="px-6 py-3 font-semibold text-white bg-green-600 rounded shadow-lg hover:text-green-900 hover:bg-green-400 hover:shadow-green-700">
                        Registrar venta</x-secondary-button>
                </div>
            </x-slot>
        </x-dialog-modal>
    </div>

</div>
