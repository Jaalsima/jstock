<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ShowProduct extends Component
{
    public $product;
    public $open =false;

    public function mount(Product $product)
    {
        $this->product = $product;
    }



    public function render()
    {
        return view('livewire.show-product');
    }
}
