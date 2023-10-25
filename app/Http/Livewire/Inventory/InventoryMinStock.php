<?php

namespace App\Http\Livewire\Inventory;

use Livewire\Component;
use App\Models\Product;

class InventoryMinStock extends Component
{
    public $labels, $data;

    public function render()
    {
        return view('livewire.inventory.inventory-min-stock');
    }
}