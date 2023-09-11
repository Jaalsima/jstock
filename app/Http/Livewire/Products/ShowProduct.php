<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Supplier;

class ShowProduct extends Component
{
    public $product, $brands, $categories, $suppliers;
    public $open =false;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->brands = Brand::get(['id', 'name']);
        $this->categories = Category::get(['id', 'name']);
        $this->suppliers = Supplier::get(['id', 'name']);
    }



    public function render()
    {
        return view('livewire.products.show-product');
    }
}
