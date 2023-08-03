<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductTable extends Component
{
    public $search;
    public function render()
    {
        $products = Product::where('name','like','%' . $this->search . '%')
                         ->orWhere('description','like','%' . $this->search . '%')->get();

        return view('livewire.product-table', compact('products'));
    }
}