<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\Product;

class DeleteProduct extends Component
{

    public $open = false;
    public $product;
    
    public function render()
    {
        return view('livewire.products.delete-product');
    }

    public function deleteConfirmed()
    {
        if ($this->product) {
            $this->product->delete();
            $this->emitTo('products.index-product', 'render');
            $this->emit('alert', '¡Producto Eliminado!');
        }
        $this->open = false; // Cierra el modal de confirmación
    }
}