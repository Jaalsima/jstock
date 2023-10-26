<?php

namespace App\Http\Livewire\Inventory;

use Livewire\Component;
use App\Models\Product;
use App\Models\PurchaseDetail;
use App\Models\SaleDetail;
use Carbon\Carbon;

class InventoryGraphics extends Component
{
    public $minStock =          false;
    public $earningsByMonth =   false;
    public $aboutToExpire =     false;
    public $expired =           false;

    public $products, $productsStock;
    public $labels;
    public $data;
    public $expirableProducts;
    public $numExpirableProducts;
    public $expiredProducts;
    public $numExpiredProducts;
    public $monthlyEarnings;
    public $totalEarningsByMonth;
    public $productsWithMinStock;
    public $colorStatus = 'green-700';

    public function mount()
    {
        $this->calculateEarningsByMonth();
        $this->changeStatus();
        $this->calculateMinStock();
        $this->calculateAboutToExpire();
        $this->calculateExpired();
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
        $this->products = Product::all();
        $monthlyEarnings = [];

        foreach ($this->products as $product) {
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

    //Método para Mostrar la gráfica de los productos que han alcanzado su stock mínimo.
    public function minStock()
    {
        $this->minStock = true;
        $this->earningsByMonth = $this->aboutToExpire = $this->expired = false;
        $this->labels = $this->productsStock->pluck('name');
        $this->data = $this->productsStock->pluck('current_stock');
    }

    public function calculateMinStock()
    {
        $this->productsStock = Product::whereColumn('current_stock', '<=', 'min_stock')->get();
        $product = $this->productsStock;
        $this->productsWithMinStock = count($product);
    }

    public function aboutToExpire()
    {
        $this->aboutToExpire = true;
        $this->minStock = $this->earningsByMonth = $this->expired = false;
    }
    public function calculateAboutToExpire()
    {
        $expirableProducts = Product::where('status', 'Expirable')->get();
        $this->numExpirableProducts = count($expirableProducts);
        if ($this->numExpirableProducts > 0) {
            foreach ($expirableProducts as $expirable) {
                $this->expirableProducts[] = [
                    'name' => $expirable->name . ' ' . $expirable->expiration,
                    'current_stock' => $expirable->current_stock,
                ];
            }
        } else {
            $this->expirableProducts[] = [
                'name' => 'No hay productos próximos a vencer',
                'current_stock' => 0,
            ];
        }
    }
    public function expired()
    {
        $this->expired = true;
        $this->minStock = $this->earningsByMonth = $this->aboutToExpire = false;
    }

    public function calculateExpired()
    {
        $expiredProducts = Product::where('status', 'Vencido')->get();
        $this->numExpiredProducts = count($expiredProducts);
        if ($this->numExpiredProducts > 0) {
            foreach ($expiredProducts as $expired) {
                $this->expiredProducts[] = [
                    'name' => $expired->name . ' ' . $expired->expiration,
                    'current_stock' => $expired->current_stock,
                ];
            }
        } else {
            $this->expiredProducts[] = [
                'name' => 'No hay productos próximos a vencer',
                'current_stock' => 0,
            ];
        }
    }

    public function changeStatus()
    {
        $now = Carbon::now();
        $nextExpireDate = Carbon::now()->addDays(10);

        foreach ($this->products as $product) {

            if ($product->expiration <= $now) {
                $product->status = "Vencido";
                $product->update([
                    'status' => 'Vencido',
                ]);
            }
            if ($product->expiration > $nextExpireDate) {
                $product->status = "Disponible";
                $product->update([
                    'status' => 'Disponible',
                ]);
            }
            if ($product->expiration <= $nextExpireDate && $product->expiration > $now) {
                $product->status = "Expirable";
                $product->update([
                    'status' => 'Expirable',
                ]);
            }
        }
    }

    public function render()
    {
        return view('livewire.inventory.inventory-graphics');
    }
}
