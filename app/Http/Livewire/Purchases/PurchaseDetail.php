<?php

namespace App\Http\Livewire\Purchases;

use Livewire\Component;
use App\Models\Purchase;

class PurchaseDetail extends Component
{
    public $purchase;

    public function mount($id)
    {
        $this->purchase = Purchase::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.purchases.purchase-detail');
    }
}