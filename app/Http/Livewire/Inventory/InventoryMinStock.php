<?php

namespace App\Http\Livewire\Inventory;

use Livewire\Component;
use App\Models\Product;

class InventoryMinStock extends Component
{
    public $productsBelowMinStock;

    public function render()
    {
        $products = Product::whereColumn('current_stock', '<=', 'min_stock')->get();
        $labels = $products->pluck('name');
        $data = $products->pluck('current_stock');
        $this->productsBelowMinStock = count($products);
        $this->emitTo('inventory.inventory-graphics', 'productsBelowMinStock', $this->productsBelowMinStock);

        return view('livewire.inventory.inventory-min-stock', [
            'labels' => $labels,
            'data' => $data,
        ]);
    }
}
