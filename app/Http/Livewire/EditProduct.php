<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class EditProduct extends Component
{
    public $open = false;
    public $product;

    public function mount(Product $product){
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.edit-product');
    }

}
