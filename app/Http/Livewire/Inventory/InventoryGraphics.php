<?php

namespace App\Http\Livewire\Inventory;

use Livewire\Component;

class InventoryGraphics extends Component
{
    public $graphic = 0;
    public $productsBelowMinStock;
    protected $listeners = [
        'productsBelowMinStock'
    ];

    public function productsBelowMinStock($data)
    {
        $this->productsBelowMinStock = $data;
    }

    public function graphicNumber($value)
    {
        $this->graphic = max(0, $value);
        return $this->graphic;
    }

    public function render()
    {
        return view('livewire.inventory.inventory-graphics', [
            'graphic' => $this->graphic,
        ]);
    }
}
