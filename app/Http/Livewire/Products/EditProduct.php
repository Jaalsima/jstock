<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Livewire\WithFileUploads;

class EditProduct extends Component
{
    use WithFileUploads;

    public $product, $brands, $categories;
    public $name, $description, $current_stock, $measurement_unit, $purchase_price, $selling_price, $status, $expiration, $observations, $image;
    public $open = false;

    protected $rules = [
        'name'              => 'required|max:50',
        'description'       => 'nullable|string',
        'current_stock'     => 'required|integer|min:0',
        'measurement_unit'  => 'nullable|string',
        'purchase_price'    => 'required|numeric|min:0',
        'selling_price'     => 'required|numeric|min:0',
        'status'            => 'required|in:Disponible,No Disponible',
        'expiration'        => 'nullable|date',
        'observations'      => 'nullable|string',
        'image'             => 'nullable|image|max:2048', // Opcional: Se puede permitir actualizar la imagen
    ];

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->brands = Brand::get(['id', 'name']);
        $this->categories = Category::get(['id', 'name']);
        $this->name = $product->name;
        $this->description = $product->description;
        $this->current_stock = $product->current_stock;
        $this->measurement_unit = $product->measurement_unit;
        $this->purchase_price = $product->purchase_price;
        $this->selling_price = $product->selling_price;
        $this->status = $product->status;
        $this->expiration = $product->expiration;
        $this->observations = $product->observations;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate();

        // Actualizar el producto en la base de datos
        $this->product->update([
            'brand_id'         => $this->brands,
            'category_id'      =>$this->categories,
            'name'             => $this->name,
            'description'      => $this->description,
            'current_stock'    => $this->current_stock,
            'measurement_unit' => $this->measurement_unit,
            'purchase_price'   => $this->purchase_price,
            'selling_price'    => $this->selling_price,
            'status'           => $this->status,
            'expiration'       => $this->expiration,
            'observations'     => $this->observations,
        ]);

        if ($this->image) {
            // Actualizar la imagen si se ha cargado una nueva
            $image_url = $this->image->store('products');
            $this->product->update(['image' => $image_url]);
        }

        // Cerrar el modal después de actualizar
        $this->open = false;

        // Emitir un evento para que se actualice la lista de productos en la página anterior
        $this->emitTo('products.index-product', 'render');

        // Emitir una notificación de éxito
        $this->emit('alert', '¡Producto Actualizado Exitosamente!');
    }

    public function render()
    {
        return view('livewire.products.edit-product');
    }
}