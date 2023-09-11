<div>
    <div class="mb-4">
        <!-- Botón para volver a la página anterior o al menú principal -->
        <a href="{{ route('dashboard') }}" class="text-blue-500">Volver</a>
    </div>

    <!-- Contenido del formulario de compra -->
    <div class="bg-white p-8 rounded shadow">
        <h3 class="text-3xl font-semibold mb-4">Registrar Compra</h3>

        <!-- Formulario de Compra -->
        <form wire:submit.prevent="savePurchase">
            <!-- Campos del formulario -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="supplier_id">Proveedor</label>
                <select wire:model="supplier_id" id="supplier_id" class="form-select mt-1 block w-full">
                    <option disabled>-- Selecciona un proveedor --</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
                @error('supplier_id') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Fecha de la Compra -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="purchase_date">Fecha de Compra</label>
                <input wire:model="purchase_date" type="date" id="purchase_date" class="form-input mt-1 block w-full">
                @error('purchase_date') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Número de Factura -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="invoice_number">Número de Factura</label>
                <input wire:model="invoice_number" type="text" id="invoice_number" class="form-input mt-1 block w-full">
                @error('invoice_number') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Monto Total de la Compra -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="total_amount">Monto Total</label>
                <input wire:model="total_amount" type="number" step="0.01" id="total_amount" class="form-input mt-1 block w-full">
                @error('total_amount') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Detalles de la Compra -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="product_id">Producto</label>
                <select wire:model="product_id" id="product_id" class="form-select mt-1 block w-full">
                    <option disabled>-- Selecciona un producto --</option>
                    @foreach ($availableProducts as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
                @error('product_id') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Otros campos de detalles de compra (cantidad, precio, etc.) -->

            <!-- Botón para enviar el formulario -->
            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="px-4 py-2 bg-green-500 text-white hover:bg-green-600 rounded-md focus:outline-none focus:ring focus:ring-green-200">
                    Guardar Compra
                </button>
            </div>
        </form>
    </div>
</div>
