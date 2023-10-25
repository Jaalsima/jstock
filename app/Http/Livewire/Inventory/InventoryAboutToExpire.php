<?php

namespace App\Http\Livewire\Inventory;

use Livewire\Component;

class InventoryAboutToExpire extends Component
{

    public $expirableProducts;
    public function render()
    {
        return view('livewire.inventory.inventory-about-to-expire');
    }
}
