<?php

namespace App\Http\Livewire\Inventory;

use Livewire\Component;

class InventoryGraphics extends Component
{
    public $value;
    public function graphic($value)
    {
        $this->value = $value;
    }
    public function render()
    {
        return view('livewire.inventory.inventory-graphics');
    }
}
