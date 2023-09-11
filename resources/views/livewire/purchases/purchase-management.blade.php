<div class="p-4">
    <div class="grid grid-cols-5 gap-4">
        <div class="h-[88vh] col-span-2 p-6 bg-gray-200 rounded-lg shadow-gray-400 shadow-md">
            <h1 class="mb-10 text-2xl font-semibold text-center">Registro de Compra</h1>

            <!-- Purchase Registration Form -->
            <form wire:submit.prevent="submitPurchase">
                <!-- Select Supplier -->

                <div class="h-[73vh] px-2">
                    <div class="mb-4">
                        <label for="supplierId" class="block font-semibold">Proveedor</label>
                        <select
                            class="w-full bg-gray-300 border-2 border-gray-400 rounded-lg focus:border-red-700 focus:ring-0 focus:bg-gray-100"
                            wire:model="supplierId" id="supplierId">
                            <option value="">-- Selecciona un proveedor --</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                        @error('supplierId')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <!-- Número de Factura -->
                        <div>
                            <label for="invoiceNumber" class="block font-semibold">Número de Factura</label>
                            <input
                                class="w-full bg-gray-300 border-2 border-gray-400 rounded-lg focus:border-red-700 focus:ring-0 focus:bg-gray-100"
                                type="text" wire:model.defer="invoiceNumber" id="invoiceNumber">
                            @error('invoiceNumber')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Monto Total -->
                        <div>
                            <label for="totalAmount" class="block font-semibold">Monto Total</label>
                            <input
                                class="w-full bg-gray-300 border-2 border-gray-400 rounded-lg focus:border-red-700 focus:ring-0 focus:bg-gray-100"
                                type="text" wire:model.defer="totalAmount" id="totalAmount">
                            @error('totalAmount')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Agregar Productos -->
                    <div class="grid grid-cols-4 gap-4 mt-10 mb-5 align-middle">
                        <div class="col-span-3">
                            <h2
                                class="w-full px-4 py-1 mx-auto text-lg font-semibold text-center text-gray-800 bg-gray-400 rounded-lg bg-opacity-60 ">
                                Productos
                            </h2>
                        </div>
                        <div class="col-span-1">
                            <button
                                class="px-4 py-1 text-center text-blue-700 bg-gray-300 border-2 border-blue-700 rounded-lg shadow-lg hover:bg-blue-600 hover:bg-opacity-40 hover:text-gray-100 hover:shadow-blue-400"
                                wire:click.prevent="addProduct">
                                <i class="fa-solid fa-plus"></i> Agregar
                            </button>
                        </div>
                    </div>

                    <div id="contentEval" class="h-[40vh] overflow-y-scroll pr-3">
                        @foreach ($products as $index => $product)
                            <div class="px-2 py-4 mb-3 bg-gray-400 rounded-lg">
                                <div class="w-full">
                                    <label for="products.{{ $index }}.id"
                                        class="block font-semibold">Producto</label>
                                    <select wire:model="products.{{ $index }}.id"
                                        id="products.{{ $index }}.id"
                                        class="w-full bg-gray-300 border-2 border-gray-600 rounded-lg focus:border-red-700 focus:ring-0 focus:bg-gray-100">
                                        <option value="">-- Selecciona un producto --</option>
                                        @foreach ($availableProducts as $p)
                                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="grid grid-cols-2 gap-4 mb-2">
                                    <div>
                                        <label for="products.{{ $index }}.quantity"
                                            class="block font-semibold">Cantidad</label>
                                        <input
                                            class="w-full bg-gray-300 border-2 border-gray-600 rounded-lg focus:border-red-700 focus:ring-0 focus:bg-gray-100"
                                            type="number" wire:model="products.{{ $index }}.quantity"
                                            id="products.{{ $index }}.quantity" placeholder="Cantidad">
                                    </div>
                                    <div>
                                        <label for="products.{{ $index }}.unit_price"
                                            class="block font-semibold">Precio
                                            Unitario</label>
                                        <input
                                            class="w-full bg-gray-300 border-2 border-gray-600 rounded-lg focus:border-red-700 focus:ring-0 focus:bg-gray-100"
                                            type="number" wire:model="products.{{ $index }}.unit_price"
                                            id="products.{{ $index }}.unit_price" placeholder="Precio Unitario">
                                    </div>
                                </div>
                                <div
                                    class="w-1/4 py-1 mx-auto mt-4 text-center text-red-700 bg-gray-300 border-2 border-red-700 rounded-md shadow-lg hover:bg-red-100 hover:border-red-500 hover:text-red-700 hover:shadow-red-400">
                                    <button wire:click.prevent="removeProduct({{ $index }})"><i
                                            class="rotate-45 fa-solid fa-plus"></i> Remover</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="fixed w-[60vh] bottom-12">

                    <!-- Botón para registrar la compra -->
                    <button
                        class="w-5/6 px-4 py-1 ml-[5vh] text-center text-green-700 bg-gray-300 border-2 border-green-700 rounded-lg shadow-lg hover:bg-green-600 hover:bg-opacity-40 hover:text-green-900 font-semibold hover:shadow-green-400"
                        type="submit">
                        Registrar Compra
                    </button>
                </div>

            </form>
        </div>

        <div id="contentEval"
            class="h-[88vh] overflow-y-scroll col-span-3 bg-gray-200 rounded-lg shadow-md shadow-gray-400">
            <h1 class="mt-8 text-2xl font-semibold text-center">Lista de Compras</h1>
            <!-- Purchase List Table -->
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Proveedor
                        </th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Número de Factura
                        </th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Monto Total
                        </th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Fecha de Registro
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchases as $purchase)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap hover:text-blue-600"><a
                                    href="#">{{ $purchase->supplier->name }}</a></td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $purchase->invoice_number }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $purchase->total_amount }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $purchase->created_at }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
