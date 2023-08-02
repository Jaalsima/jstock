<x-app-layout>
    <div>
        <h1>Nuevo Producto</h1>
        <form action="{{route('products.store')}}" method="POST">
        @csrf    
    <label for="category_id">Categoría</label>
    <input type="number" name="category_id">
    <br>
    <label for="brand_id">Marca</label>
    <input type="number" name="brand_id">
    <br>
    <label for="name">Nombre</label>
    <input type="text" name="name">
    <br>
    {{-- <label for="description">Nombre</label>
    <input type="text">
    <br> --}}
    <label for="purchase_price">Precio de compra</label>
    <input type="number" name="purchase_price">
    <br>
    <label for="selling_price">Precio de Venta</label>
    <input type="number" name="selling_price">
    <br>

    <label for="status">Estado</label>
    <input type="number" name="status" max=1 min=0>
    <br>
    <input type="submit" value="Crear">
</form>
    </div>
</x-app-layout>

'name',
'category_id',
'brand_id',
'purchase_price',
'selling_price',