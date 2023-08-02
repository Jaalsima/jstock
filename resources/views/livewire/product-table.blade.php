<!-- component -->
<div class="flex flex-col">
    <h1 class="text-center text-gray-500 text-2xl font-bold">Lista de Productos</h1>
    <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
      <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
        <div class="overflow-hidden">
          <table class="min-w-full">
            <thead class="bg-red-200 border-b">
              <tr>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  ID
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  Nombre
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  Descripción
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  Marca
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Categoría
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Precio de Compra
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Precio de Venta
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Creado en
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Actualizado en
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Estado
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Acciones
                  </th>
              </tr>
            </thead>
            <tbody>
                <tr class="bg-gray-300 border-b transition duration-300 ease-in-out hover:bg-gray-400">
                @forelse ($products as $product)
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$product->id}}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><a href="{{route('products.show', $product)}}">{{$product->name}}</a></td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$product->description}}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$product->brand_id}}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$product->category_id}}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$product->purchase_price}}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$product->selling_price}}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$product->created_at}}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$product->updated_at}}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$product->status}}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            <a href="#">Editar</a>
                            <form action="{{route('products.destroy', $product)}}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Eliminar">
                            </form>
                        </td>
                    </tr>      
            @empty
            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><h1>No hay productos disponibles</h1></td>        
            </tr>           
            @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>