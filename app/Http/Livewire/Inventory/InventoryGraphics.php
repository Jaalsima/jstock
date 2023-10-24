<?php

namespace App\Http\Livewire\Inventory;

use Livewire\Component;
use App\Models\Product;
use App\Models\PurchaseDetail;
use App\Models\SaleDetail;

class InventoryGraphics extends Component
{
    public $minStock =          false;
    public $earningsByMonth =   false;
    public $aboutToExpire =     false;
    public $expired =           false;
    public $products;
    public $labels;
    public $data;
    public $expirableProducts;
    public $expiredProducts;
    public $monthlyEarnings;
    public $totalEarningsByMonth;
    public $productsWithMinStock;
    public $colorStatus = 'green-700';

    public function mount()
    {
        $this->calculateMinStock();
        $this->calculateEarningsByMonth();
        $this->calculateAboutToExpire();
        $this->calculateExpired();
    }

    //Método para Mostrar la gráfica de los productos que han alcanzado su stock mínimo.
    public function minStock()
    {
        $this->minStock = true;
        $this->earningsByMonth = $this->aboutToExpire = $this->expired = false;
        $this->labels = $this->products->pluck('name');
        $this->data = $this->products->pluck('current_stock');
    }

    public function calculateMinStock()
    {
        $this->products = Product::whereColumn('current_stock', '<=', 'min_stock')->get();
        $this->productsWithMinStock = count($this->products);
    }


    //Método para Mostrar la gráfica de las ganancias por mes por cada producto.
    public function earningsByMonth()
    {
        $this->earningsByMonth = true;
        $this->minStock = $this->aboutToExpire = $this->expired = false;
    }
    public function calculateEarningsByMonth()
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
            $sumEarnings = 0;
            foreach ($monthlyEarnings as $earningByProduct) {
                $sumEarnings += $earningByProduct['earnings'];
            }
        }

        $this->monthlyEarnings = $monthlyEarnings;
        $this->totalEarningsByMonth = $sumEarnings;

        if ($this->totalEarningsByMonth < 0) {
            $this->colorStatus = 'red-700';
        }
    }


    public function aboutToExpire()
    {
        $this->aboutToExpire = true;
        $this->minStock = $this->earningsByMonth = $this->expired = false;
    }
    public function calculateAboutToExpire()
    {
        $expirableProducts = Product::where('status', 'Expirable')->get();
        $this->expirableProducts = count($expirableProducts);
    }

    public function expired()
    {
        $this->expired = true;
        $this->minStock = $this->earningsByMonth = $this->aboutToExpire = false;
    }

    public function calculateExpired()
    {
        $products = Product::where('status', 'Vencido')->get();
        $this->expiredProducts = count($products);
    }

    public function render()
    {
        return view('livewire.inventory.inventory-graphics');
    }
}