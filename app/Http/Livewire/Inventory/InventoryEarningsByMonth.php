<?php

namespace App\Http\Livewire\Inventory;

use Livewire\Component;
use App\Models\Product;
use App\Models\PurchaseDetail;
use App\Models\SaleDetail;

class InventoryEarningsByMonth extends Component
{
    public $monthlyEarnings;

    public function mount()
    {
        $this->calculateMonthlyEarnings();
    }

    public function calculateMonthlyEarnings()
    {
        $currentMonth = now()->format('m');
        $products = Product::all();
        $monthlyEarnings = [];

        foreach ($products as $product) {
            $purchaseDetails = PurchaseDetail::whereHas('purchase', function ($query) use ($currentMonth) {
                $query->whereMonth('purchase_date', $currentMonth);
            })->where('product_id', $product->id)->get();

            $saleDetails = SaleDetail::whereHas('sale', function ($query) use ($currentMonth) {
                $query->whereMonth('sale_date', $currentMonth);
            })->where('product_id', $product->id)->get();

            $totalPurchaseAmount = $purchaseDetails->sum('subtotal');
            $totalSaleAmount = $saleDetails->sum('subtotal');

            $monthlyEarnings[] = [
                'product' => $product->name,
                'earnings' => $totalSaleAmount - $totalPurchaseAmount,
            ];
        }

        $this->monthlyEarnings = $monthlyEarnings;
    }

    public function render()
    {
        return view('livewire.inventory.inventory-earnings-by-month', [
            'monthlyEarnings' => $this->monthlyEarnings,
        ]);
    }
}
