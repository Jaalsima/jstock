<div class="container p-6 mx-auto">
    <h2 class="mb-4 text-2xl font-bold">REGISTRO DE COMPRAS</h2>

    <div class="flex mb-4">
        <div class="w-1/3 mr-4">
            <label for="supplierId" class="block mb-1 font-bold">Proveedor</label>
            <select wire:model="supplierId" id="supplierId" class="w-full p-2 border border-gray-300 rounded">
                <option hidden>-- Selecciona un proveedor --</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
            @error('supplierId')
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

        <div class="w-1/3 mr-4">
            <label for="invoiceDate" class="block mb-1">Fecha Factura</label>
            <input type="date" wire:model="invoiceDate" id="invoiceDate"
                class="w-full p-2 border border-gray-300 rounded">
            @error('invoiceDate')
                <p class="mt-1 text-red-500 text-md">{{ $message }}</p>
            @enderror
        </div>

        <div class="w-1/3">
            <button wire:click="addProduct"
                class="px-4 py-2 mt-8 font-semibold text-white bg-blue-600 rounded shadow-lg hover:text-blue-900 hover:bg-blue-400 hover:shadow-blue-700">Agregar
                Producto
            </button>
        </div>
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
                                <option hidden>-- Selecciona un producto --</option>
                                @foreach ($availableProducts as $availableProduct)
                                    <option value="{{ $availableProduct->id }}">{{ $availableProduct->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="p-2">
                            <input type="number" wire:model="products.{{ $index }}.quantity"
                                class="w-full p-2 border border-gray-300 rounded" min="1"
                                @if (empty($product['id'])) disabled @endif>
                        </td>
                        <td class="p-2">
                            <input type="number" wire:model="products.{{ $index }}.unit_price"
                                class="w-full p-2 border border-gray-300 rounded" readonly>
                        </td>
                        <td class="p-2">
                            <input type="number" wire:model="products.{{ $index }}.subtotal"
                                class="w-full p-2 border border-gray-300 rounded" readonly>
                        </td>
                        <td class="p-2">
                            <x-secondary-button wire:click="removeProduct({{ $index }})"
                                class="px-6 py-3 font-semibold text-white bg-red-600 border-red-500 rounded shadow-lg hover:text-red-900 hover:bg-red-400 hover:shadow-red-700">Eliminar</x-secondary-button>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if ($selectedPurchase)
        <x-dialog-modal wire:model="open">
            <x-slot name="title">
                <h2 class="text-2xl font-bold text-center">Detalle de Compra</h2>
            </x-slot>

            <x-slot name="content">
                <div class="p-4">
                    <div class="flex justify-between">
                        <div class="mb-4">
                            <p class="text-lg font-semibold">Proveedor:</p>
                            <p>{{ $selectedPurchase->supplier->name }}</p>
                        </div>
                        <div class="mb-4">
                            <p class="text-lg font-semibold">Número de Factura:</p>
                            <p>{{ $selectedPurchase->invoice_number }}</p>
                        </div>
                    </div>
                    <div class="mb-4">
                        <p class="text-lg font-semibold">Fecha de Compra:</p>
                        <p>{{ $selectedPurchase->purchase_date }}</p>
                    </div>





                    <!-- Lista de Productos -->
                    <div>
                        <h3 class="mb-2 text-lg font-semibold">Productos:</h3>
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
                                @foreach ($selectedPurchase->purchaseDetails as $purchaseDetail)
                                    <tr>
                                        <td class="p-2">{{ $purchaseDetail->product->name }}</td>
                                        <td class="p-2">{{ $purchaseDetail->quantity }}</td>
                                        <td class="p-2">${{ number_format($purchaseDetail->unit_price, 2) }}</td>
                                        <td class="p-2">${{ number_format($purchaseDetail->subtotal, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Líneas divisorias -->
                    <div class="my-4 border-t"></div>

                    <div class="flex justify-end">
                        <p class="text-lg font-semibold">Total:</p>
                        <p class="text-2xl font-bold text-green-600">
                            ${{ number_format($selectedPurchase->total_amount, 2) }}</p>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <div class="flex justify-end">
                    <x-secondary-button wire:click="closePurchaseDetailsModal()"
                        class="px-6 py-3 font-semibold text-white bg-gray-600 rounded shadow-lg hover:text-gray-900 hover:bg-gray-400 hover:shadow-gray-700">
                        Cerrar</x-secondary-button>
                </div>
            </x-slot>
        </x-dialog-modal>
    @endif


    <div class="flex items-center justify-between mb-4">
        <div>
            <h4 class="text-xl font-bold">Total: ${{ number_format($totalAmount, 2) }}</h4>
        </div>
        @if (session('error'))
            <p class="text-red-500">{{ session('error') }}</p>
        @endif
        <div>
            <button wire:click="confirmPurchase"
                class="px-6 py-3 font-semibold text-white bg-green-600 rounded shadow-lg hover:text-green-900 hover:bg-green-400 hover:shadow-green-700">Confirmar
                Compra
            </button>
        </div>
    </div>

    <div class="mt-8">
        <h2 class="mb-4 text-2xl font-bold">Listado de Compras</h2>
        <table class="w-full border border-collapse border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 cursor-pointer" wire:click="sortField('created_at')">Fecha de Compra</th>
                    <th class="p-2">Proveedor</th>
                    <th class="p-2">Número de Factura</th>
                    <th class="p-2">Total</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($purchases as $purchase)
                    <tr class="cursor-pointer hover:bg-blue-400"
                        wire:click="showPurchaseDetails({{ $purchase->id }})">
                        <td class="p-2">{{ $purchase->purchase_date }}</td>
                        <td class="p-2">{{ $purchase->supplier->name }}</td>
                        <td class="p-2">{{ $purchase->invoice_number }}</td>
                        <td class="p-2">{{ number_format($purchase->total_amount, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $purchases->links() }}

        <x-dialog-modal maxWidth="4xl" wire:model="openConfirmingPurchase">
            <x-slot name="title">
                <h1 class="my-10 text-3xl font-bold text-center">Confirmación Registro de Compra</h1>
            </x-slot>
            <x-slot name="content">
                <h2 class="mb-10 text-xl font-semibold text-center">Por favor verifique que todos los datos sean <br>
                    correctos antes de registar la compra.</h2>
                <div class="flex mb-4">
                    <div class="w-1/3 mr-4">
                        <label for="supplierId" class="block mb-1">Proveedor</label>
                        <select disabled wire:model="supplierId" id="supplierId"
                            class="w-full p-2 border border-gray-300 rounded">
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-1/3 mr-4">
                        <label for="invoiceNumber" class="block mb-1">Número de Factura</label>
                        <input type="text" disabled wire:model="invoiceNumber" id="invoiceNumber"
                            class="w-full p-2 border border-gray-300 rounded">
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
                                    <select disabled wire:model="products.{{ $index }}.id"
                                        class="w-full p-2 border border-gray-300 rounded">
                                        @foreach ($availableProducts as $availableProduct)
                                            <option value="{{ $availableProduct->id }}">{{ $availableProduct->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="p-2">
                                    <input disabled type="number" wire:model="products.{{ $index }}.quantity"
                                        class="w-full p-2 border border-gray-300 rounded" min="1">
                                </td>
                                <td class="p-2">
                                    <input disabled type="text"
                                        wire:model="products.{{ $index }}.unit_price"
                                        class="w-full p-2 border border-gray-300 rounded" readonly>
                                </td>
                                <td class="p-2">
                                    <input disabled type="text" wire:model="products.{{ $index }}.subtotal"
                                        class="w-full p-2 border border-gray-300 rounded" readonly>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </x-slot>
            <x-slot name="footer">
                <div class="flex justify-between w-full px-4">
                    <x-secondary-button wire:click="$set('openConfirmingPurchase', false)"
                        class="px-6 py-3 font-semibold text-white bg-gray-600 rounded shadow-lg hover:text-gray-900 hover:bg-gray-400 hover:shadow-gray-700">
                        Cancelar Registro</x-secondary-button>
                    <x-secondary-button wire:click="submitPurchase"
                        class="px-6 py-3 font-semibold text-white bg-green-600 rounded shadow-lg hover:text-green-900 hover:bg-green-400 hover:shadow-green-700">
                        Registrar compra</x-secondary-button>
                </div>
            </x-slot>
        </x-dialog-modal>

    </div>
</div>
