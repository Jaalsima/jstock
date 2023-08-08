<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class CreateProduct extends Component
{

    public $open =false;
    public $brands, $categories;

    public $name, $description, $category_id, $brand_id, $purchase_price, $selling_price, $status;

    public function add(){
        Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'brand_id' => $this->brand_id,
            'purchase_price' => $this->purchase_price,
            'selling_price' => $this->selling_price,
            'status' => $this->status
        ]);

        $this->reset(['open', 'name', 'description', 'category_id', 'brand_id', 'purchase_price', 'selling_price', 'status']);
        $this->emitTo('product-table', 'render');
        $this->emit('alert', '¡Producto Creado Exitosamente!');

    }

    public function mount()
    {
        $this->brands = Brand::get(['id', 'name']); // Cambia el método de obtención según tu base de datos y modelo
        $this->categories = Category::get(['id', 'name']); // Cambia el método de obtención según tu base de datos y modelo
    }

    public function render()
    {
        return view('livewire.create-product');
    }
}