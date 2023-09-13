<div>
    <h2>Detalles de Compra</h2>

    <p><strong>ID de Compra:</strong> {{ $purchase->id }}</p>
    <p><strong>ID de Proveedor:</strong> {{ $purchase->supplier_id }}</p>
    <p><strong>Número de Factura:</strong> {{ $purchase->invoice_number }}</p>
    <p><strong>Monto Total:</strong> ${{ $purchase->total_amount }}</p>
    <!-- Agrega más detalles según sea necesario -->

    <a href="{{ route('#') }}">Volver a la Lista de Compras</a>
</div>
