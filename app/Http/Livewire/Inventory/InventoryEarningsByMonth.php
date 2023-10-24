<?php

namespace App\Http\Livewire\Inventory;

use Livewire\Component;

class InventoryEarningsByMonth extends Component
{
    public $monthlyEarnings = [];

    public function render()
    {
        return view('livewire.inventory.inventory-earnings-by-month');
    }
}
