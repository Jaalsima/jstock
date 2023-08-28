<?php

namespace App\Http\Livewire\Suppliers;

use Livewire\Component;
use App\Models\Supplier;
use App\Models\Brand;
use App\Models\Category;

class ShowSupplier extends Component
{
    public $supplier, $brands, $categories;
    public $open =false;

    public function mount(Supplier $supplier)
    {
        $this->supplier = $supplier;
        $this->brands = Brand::get(['id', 'name']);
        $this->categories = Category::get(['id', 'name']);
    }



    public function render()
    {
        return view('livewire.suppliers.show-supplier');
    }
}