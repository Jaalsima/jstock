<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class CreateProduct extends Component
{

    public $product, $name, $description, $category_id, $brand_id, $purchase_price, $selling_price, $status, $brands, $categories;

    public $open =false;

    public function mount()
    {
        $this->brands = Brand::get(['id', 'name']);
        $this->categories = Category::get(['id', 'name']);
        $this->product = Product::get();
    }

    public function add(){
        Product::create([
            'name'           => $this->name,
            'description'    => $this->description,
            'category_id'    => $this->category_id,
            'brand_id'       => $this->brand_id,
            'purchase_price' => $this->purchase_price,
            'selling_price'  => $this->selling_price,
            'status'         => $this->status
        ]);

        $this->reset(['open', 'name', 'description', 'category_id', 'brand_id', 'purchase_price', 'selling_price', 'status']);
        $this->emitTo('product-table', 'render');
        $this->emit('alert', '¡Producto Creado Exitosamente!');

    }

    public function render()
    {
        return view('livewire.create-product');
    }
}
