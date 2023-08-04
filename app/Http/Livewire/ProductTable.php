<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductTable extends Component
{
    public $search;
    public $sort ="id";
    public $direction ="desc";
    public function render()
    {
        $products = Product::where('name','like','%' . $this->search . '%')
                         ->orWhere('description','like','%' . $this->search . '%')
                         ->orderBy($this->sort, $this->direction)
                         ->get();

        return view('livewire.product-table', compact('products'));
    }
    public function order($sort){
        $this->sort = $sort;
    }
}