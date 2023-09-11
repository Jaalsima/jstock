<?php

namespace App\Http\Livewire\Sales;

use Livewire\Component;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\User;
use App\Models\Customer;
use App\Models\Product;

class SaleManagement extends Component
{
    public $customer_id;
    public $sale_date;
    public $total_amount;
    public $product_id;
    public $quantity;
    public $unit_price;
    public $availableProducts = [];

    public function render()
    {
        $customers = Customer::all();
        $products = Product::all();

        return view('livewire.sales.sale-management', compact('customers', 'products'));
    }

    public function updatedProductId()
    {
        $product = Product::find($this->product_id);
        $this->unit_price = $product ? $product->price : null;
    }

    public function saveSale()
    {
        $this->validate([
            'customer_id' => 'required',
            'sale_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'product_id' => 'required',
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0.01',
        ]);

        $sale = Sale::create([
            'customer_id' => $this->customer_id,
            'user_id' => auth()->user()->id,
            'sale_date' => $this->sale_date,
            'total_amount' => $this->total_amount,
        ]);

        SaleDetail::create([
            'sale_id' => $sale->id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'unit_price' => $this->unit_price,
            'subtotal' => $this->quantity * $this->unit_price,
        ]);

        $this->resetForm();

        session()->flash('message', 'Venta registrada exitosamente.');
    }

    private function resetForm()
    {
        $this->customer_id = null;
        $this->sale_date = null;
        $this->total_amount = null;
        $this->product_id = null;
        $this->quantity = null;
        $this->unit_price = null;
        $this->availableProducts = [];
    }
}
