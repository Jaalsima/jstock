<?php

namespace App\Http\Livewire\Purchases;

use Livewire\Component;
use App\Models\Purchase;

class PurchaseDetail extends Component
{
    public $purchase;
    public $open = false;

    public function mount(Purchase $purchase)
    {
        $this->purchase = $purchase;
    }

    public function show()
    {
        $this->open = true;
    }

    public function close()
    {
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.purchases.purchase-detail');
    }
}