<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Inventario</title>
    <style>
        body {
            padding: 2rem;
            font-family: Arial, sans-serif;
        }

        h1 {
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            background-color: #f87171;
            padding: 1rem;
            margin-bottom: 2rem;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f3f4f6;
        }

        tbody tr:nth-child(even) {
            background-color: #f9fafb;
        }
    </style>
</head>
<body>

    <h1>Reporte de Inventario {{ now()->format('d/m/Y') }}</h1>

    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Proveedor</th>
                    <th>Categoría</th>
                    <th>Marca</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Unidad de Medida</th>
                    <th>Precio de Compra</th>
                    <th>Precio de Venta</th>
                    <th>Fecha de Vencimiento</th>
                    <th>Stock Mínimo</th>
                    <th>Estado</th>
                    <th>Observaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product['id'] }}</td>
                        <td>{{ $product->supplier->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->brand->name }}</td>
                        <td>{{ $product['name'] }}</td>
                        <td>{{ $product['description'] }}</td>
                        <td>{{ $product['current_stock'] }}</td>
                        <td>{{ $product['mesurement_unit'] }}</td>
                        <td>{{ $product['purchase_price'] }}</td>
                        <td>{{ $product['selling_price'] }}</td>
                        <td>{{ $product['expiration'] }}</td>
                        <td>{{ $product['min_stock'] }}</td>
                        <td>{{ $product['status'] }}</td>
                        <td>{{ $product['observations'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
