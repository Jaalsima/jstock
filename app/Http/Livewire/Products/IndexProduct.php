<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class IndexProduct extends Component
{
    use WithPagination;

    public $search;
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
            ->paginate(8);

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
}