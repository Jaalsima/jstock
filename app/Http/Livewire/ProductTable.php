<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductTable extends Component
{
    public function render()
    {
        $products = Product::latest()->paginate();
        return view('livewire.product-table', compact('products'));
    }
}
