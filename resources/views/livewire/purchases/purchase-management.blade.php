<div>
    <div>
        <!-- Botón para abrir el modal de compra -->
        <a href="#" wire:click="openPurchaseModal">Registrar Compra</a>
    
        <!-- Modal de Compra -->
        @if($isOpen)
            <div class="fixed inset-0 z-50 flex items-center justify-center overflow-x-hidden overflow-y-auto outline-none focus:outline-none">
                <div class="relative w-auto max-w-md mx-auto my-6">
                    <!-- Contenido del modal -->
                    <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                        <!-- Encabezado del modal -->
                        <div class="flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t">
                            <h3 class="text-3xl font-semibold">
                                Registrar Compra
                            </h3>
                            <!-- Botón para cerrar el modal -->
                            <button class="p-1 ml-auto bg-transparent border-0 text-black float-right text-3xl leading-none font-semibold outline-none focus:outline-none" wire:click="closePurchaseModal">
                                <span class="bg-transparent text-black h-6 w-6 text-2xl block outline-none focus:outline-none">
                                    ×
                                </span>
                            </button>
                        </div>
                        <!-- Cuerpo del modal -->
                        <div class="relative p-6 flex-auto">
                            <!-- Formulario de Compra -->
                            <form wire:submit.prevent="savePurchase">
                                <!-- Campos del formulario -->
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="supplier_id">Proveedor</label>
                                    <select wire:model="supplier_id" id="supplier_id" class="form-select mt-1 block w-full">
                                        <option value="">Selecciona un proveedor</option>
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
                                        <option value="">Selecciona un producto</option>
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
                </div>
            </div>
            <!-- Fondo oscuro del modal -->
            <div class="fixed inset-0 z-40 bg-black opacity-25"></div>
        @endif
    </div>
</div>
