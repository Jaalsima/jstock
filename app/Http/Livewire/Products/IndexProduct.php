<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class IndexProduct extends Component
{
    use WithPagination;

    public $search, $product;
    public $sort = "id";
    public $direction = "desc";
    public $open = false;
    protected $listeners = ['render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $products = Product::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate(10);

        return view('livewire.products.index-product', compact('products'));
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            $this->direction = ($this->direction == "desc") ? "asc" : "desc";
        } else {
            $this->sort = $sort;
            $this->direction = "asc";
        }
    }

    public function confirmDelete($productId)
    {
        $this->product = Product::find($productId);
        $this->open = true; // Abre el modal de confirmación
    }

    public function deleteConfirmed()
    {
        if ($this->product) {
            $this->product->delete();
            $this->emitTo('index-product', 'render');
            $this->emit('alert', '¡Producto Eliminado Exitosamente!');
        }
        $this->open = false; // Cierra el modal de confirmación
    }
}