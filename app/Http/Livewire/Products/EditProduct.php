<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Livewire\WithFileUploads;

class EditProduct extends Component
{
    use WithFileUploads;

    public $open = false;
    public $product, $categories, $brands, $image, $unique_input_identifier;

    protected $rules = [
        'product.brand_id'          => 'required|exists:brands,id',
        'product.category_id'       => 'required|exists:categories,id',
        'product.name'              => 'required|max:50',
        'product.description'       => 'nullable|string',
        'product.current_stock'     => 'required|integer|min:0',
        'product.measurement_unit'  => 'nullable|string',
        'product.purchase_price'    => 'required|numeric|min:0',
        'product.selling_price'     => 'required|numeric|min:0',
        'product.status'            => 'required|in:Disponible,No Disponible',
        'product.expiration'        => 'nullable|date',
        'product.observations'      => 'nullable|string',
        'product.image'             => 'required|image|max:2048',
    ];

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->unique_input_identifier = rand();
        $this->brands = Brand::get(['id', 'name']);
        $this->categories = Category::get(['id', 'name']);
    }

    public function save()
    {
        $this->validate();

        $this->product->save();
        $this->reset(['open']);
        $this->emitTo('product-table', 'render');
        $this->emit('alert', '¡Producto Actualizado Exitosamente!');
    }

    public function render()
    {
        return view('livewire.products.edit-product');
    }
}