<div class="container p-6 mx-auto">
    <h2 class="mb-4 text-2xl font-bold">Registro de Compras</h2>

    <div class="flex mb-4">
        <div class="w-1/3 mr-4">
            <label for="supplierId" class="block mb-1">Proveedor</label>
            <select wire:model="supplierId" id="supplierId" class="w-full p-2 border border-gray-300 rounded">
                <option disabled>-- Selecciona un proveedor --</option>
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
        <div class="w-1/3">
            <button wire:click="addProduct" class="px-4 py-2 mt-8 text-white bg-blue-500 rounded">Agregar
                Producto</button>
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
    </div>

    @if ($selectedPurchase)
        <x-dialog-modal wire:model="open">
            <x-slot name="title">
                <h2 class="text-xl font-bold">Detalles de la Compra</h2>
            </x-slot>

            <x-slot name="content">
                <p>Fecha de Compra: {{ $selectedPurchase->purchase_date }}</p>
                <p>Proveedor: {{ $selectedPurchase->supplier->name }}</p>
                <p>Número de Factura: {{ $selectedPurchase->invoice_number }}</p>
                <p>Total: ${{ number_format($selectedPurchase->total_amount, 2) }}</p>

                <!-- Botones de editar y eliminar -->
                <div class="mt-4">
                    <button wire:click="editPurchase({{ $selectedPurchase->id }})"
                        class="btn btn-primary">Editar</button>
                    <button wire:click="confirmDeletePurchase({{ $selectedPurchase->id }})"
                        class="btn btn-danger">Eliminar</button>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="closePurchaseDetailsModal()">Salir</x-secondary-button>
            </x-slot>
        </x-dialog-modal>
    @endif

    <div class="flex items-center justify-between mb-4">
        <div>
            <h4 class="text-xl font-bold">Total: ${{ number_format($totalAmount, 2) }}</h4>
        </div>
        <div>
            <button wire:click="submitPurchase"
                class="px-6 py-3 text-white bg-green-600 rounded shadow-lg hover:text-green-700 hover:bg-green-200 hover:shadow-green-700">Registrar
                Compra</button>
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
                    <tr class="cursor-pointer hover:bg-blue-400" wire:click="showPurchaseDetails({{ $purchase->id }})">
                        <td class="p-2">{{ $purchase->purchase_date }}</td>
                        <td class="p-2">{{ $purchase->supplier->name }}</td>
                        <td class="p-2">{{ $purchase->invoice_number }}</td>
                        <td class="p-2">{{ number_format($purchase->total_amount, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $purchases->links() }}

        @if ($confirmingDelete)
            <x-dialog-modal wire:model="open_delete">
                <x-slot name="title">
                    <h2 class="text-xl font-bold">Confirmar Eliminación</h2>
                </x-slot>

                <x-slot name="content">
                    <p>¿Estás seguro de que deseas eliminar esta compra?</p>
                </x-slot>

                <x-slot name="footer">
                    <button wire:click="deletePurchase" class="bg-red-400">Eliminar</button>
                    <button wire:click="$set('confirmingDelete', null)" class="bg-red-400">Cancelar</button>
                </x-slot>
            </x-dialog-modal>
        @endif

    </div>
</div>
