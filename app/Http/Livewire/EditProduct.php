<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class EditProduct extends Component
{
    public $open = false;
    public $product;
    public $brands;
    public $categories;


    protected $rules = [
        'product.name' => 'required',
        'product.description' => 'required',
        'product.brand_id' => 'required',
        'product.category_id' => 'required',
        'product.purchase_price' => 'required',
        'product.selling_price' => 'required',
        'product.status' => 'required',
    ];

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->brands = Brand::get(['id', 'name']);
        $this->categories = Category::get(['id', 'name']);
    }

    public function update()
    {
        $this->validate();

        $this->product->save();

        $this->emitTo('product-table', 'render');
        $this->emit('alert', '¡Producto Actualizado Exitosamente!');
    }

    public function render()
    {
        return view('livewire.edit-product');
    }
}