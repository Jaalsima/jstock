<div>
    @if ($purchase)
        <div
            class="fixed inset-0 z-50 flex items-center justify-center overflow-x-hidden overflow-y-auto outline-none focus:outline-none">
            <div class="relative w-auto max-w-3xl mx-auto my-6">
                <div
                    class="relative flex flex-col w-full bg-white border-0 rounded-lg shadow-lg outline-none focus:outline-none">
                    <!-- Header -->
                    <div
                        class="flex items-start justify-between p-5 border-b border-solid rounded-t border-blueGray-200">
                        <h3 class="text-3xl font-semibold">
                            Detalles de Compra
                        </h3>
                        <button wire:click="closePurchaseDetailsModal"
                            class="float-right p-1 ml-auto -mt-2 -mr-2 text-3xl font-semibold leading-none text-black bg-transparent border-0 outline-none opacity-5 focus:outline-none">
                            <span
                                class="block w-6 h-6 text-2xl text-black bg-transparent outline-none opacity-5 focus:outline-none">
                                ×
                            </span>
                        </button>
                    </div>
                    <!-- Body -->
                    <div class="relative flex-auto p-6">
                        <!-- Content here -->
                        <p><strong>Fecha de Compra:</strong> {{ $purchase->purchase_date }}</p>
                        <p><strong>Proveedor:</strong> {{ $purchase->supplier->name }}</p>
                        <p><strong>Número de Factura:</strong> {{ $purchase->invoice_number }}</p>
                        <p><strong>Total:</strong> ${{ number_format($purchase->total_amount, 2) }}</p>
                        <h4 class="mt-4 text-xl font-semibold">Productos:</h4>
                        <ul>
                            @foreach ($purchase->purchaseDetails as $purchaseDetail)
                                <li>
                                    {{ $purchaseDetail->product->name }} - Cantidad: {{ $purchaseDetail->quantity }},
                                    Subtotal: ${{ number_format($purchaseDetail->subtotal, 2) }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Footer -->
                    <div class="flex items-center justify-end p-6 border-t border-solid rounded-b border-blueGray-200">
                        <button wire:click="closePurchaseDetailsModal"
                            class="px-6 py-2 mb-1 mr-1 text-sm font-bold text-red-500 uppercase transition-all duration-150 ease-linear outline-none background-transparent focus:outline-none">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed inset-0 z-40 bg-black opacity-25"></div>
    @endif
</div>
