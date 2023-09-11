<div>
    <div class="mb-4">
        <!-- Botón para volver a la página anterior o al menú principal -->
        <a href="{{ route('dashboard') }}" class="text-blue-500">Volver</a>
    </div>

    <!-- Contenido del formulario de venta -->
    <div class="bg-white p-8 rounded shadow">
        <h3 class="text-3xl font-semibold mb-4">Registrar Venta</h3>

        <!-- Formulario de Venta -->
        <form wire:submit.prevent="saveSale">
            <!-- Campos del formulario -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="customer_id">Cliente</label>
                <select wire:model="customer_id" id="customer_id" class="form-select mt-1 block w-full">
                    <option disabled>-- Selecciona un cliente --</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
                @error('customer_id') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Fecha de la Venta -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="sale_date">Fecha de Venta</label>
                <input wire:model="sale_date" type="date" id="sale_date" class="form-input mt-1 block w-full">
                @error('sale_date') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Monto Total de la Venta -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="total_amount">Monto Total</label>
                <input wire:model="total_amount" type="number" step="0.01" id="total_amount" class="form-input mt-1 block w-full">
                @error('total_amount') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Detalles de la Venta -->
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

            <!-- Otros campos de detalles de venta (cantidad, precio, etc.) -->

            <!-- Botón para enviar el formulario -->
            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="px-4 py-2 bg-green-500 text-white hover:bg-green-600 rounded-md focus:outline-none focus:ring focus:ring-green-200">
                    Guardar Venta
                </button>
            </div>
        </form>
    </div>
</div>
