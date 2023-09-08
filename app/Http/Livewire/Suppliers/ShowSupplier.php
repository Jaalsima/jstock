<?php

namespace App\Http\Livewire\Suppliers;

use Livewire\Component;

use App\Models\Supplier;

class ShowSupplier extends Component
{
    public $supplier;
    public $open_show =false;

    public function mount(Supplier $supplier)
    {
        $this->supplier = $supplier;
    }

    public function render()
    {
        return view('livewire.suppliers.show-supplier');
    }
}