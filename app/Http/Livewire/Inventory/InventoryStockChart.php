<?php

namespace App\Http\Livewire\Inventory;

use Livewire\Component;
use App\Models\Product;

class InventoryStockChart extends Component
{

    public $productsCount = [];
    public $productsName = [];

    public function mount()
    {
        $products = Product::get();
        foreach ($products as $product) {
            $this->productsCount[] = $product->current_stock;
            $this->productsName[] = $product->name;
        }
    }
    public function render()
    {
        return view('livewire.inventory.inventory-stock-chart');
    }
}
