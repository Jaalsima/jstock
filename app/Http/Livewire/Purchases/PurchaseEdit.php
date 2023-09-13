<?php

namespace App\Http\Livewire\Purchases;

use Livewire\Component;
use App\Models\Purchase;
use App\Models\Supplier;

class PurchaseEdit extends Component
{
    public $purchase;
    public $suppliers;

    public function mount($id)
    {
        $this->purchase = Purchase::findOrFail($id);
        $this->suppliers = Supplier::all();
    }

    public function render()
    {
        return view('livewire.purchases.purchase-edit');
    }
}