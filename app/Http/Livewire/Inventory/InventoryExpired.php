<?php

namespace App\Http\Livewire\Inventory;

use Livewire\Component;

class InventoryExpired extends Component
{
    public $expiredProducts;
    public function render()
    {
        return view('livewire.inventory.inventory-expired');
    }
}
