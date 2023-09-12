<?php

namespace App\Http\Livewire\Sales;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Sale;
use App\Models\Customer;
use App\Models\Product;

class SaleManagement extends Component
{
    public $customerId;
    public $invoiceNumber;
    public $totalAmount;
    public $products = [];

    public function render()
    {
        $sales = Sale::orderBy('created_at', 'desc')->get();
        $customers = Customer::all();
        $allProducts = Product::all();


        return view('livewire.sales.sale-management', [
            'sales' => $sales,
            'customers' => $customers,
            'allProducts' => $allProducts,
        ]);
    }

    public function submitSale()
    {
        $this->validate([
            'customerId' => 'required|exists:customers,id',
            'invoiceNumber' => 'required|unique:sales,invoice_number',
            'totalAmount' => 'required|numeric',
        ]);

        $sale = Sale::create([
            'user_id' => Auth::id(),
            'customer_id' => $this->customerId,
            'invoice_number' => $this->invoiceNumber,
            'total_amount' => $this->totalAmount,
            'sale_date' => now(),
        ]);

        // Asignación de productos a la venta y cálculo del subtotal.
            $totalSale = 0.0;
            foreach ($this->products as $product) {
            $subtotal = $product['quantity'] * $product['unit_price'];
            $totalSale += $subtotal;
            $saleDetail = [
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
                'unit_price' => $product['unit_price'],
                'subtotal' => $subtotal,
            ];

            $sale->saleDetails()->create($saleDetail);
        }

        // Clear form fields or perform any other necessary actions

        // Redirect or update the Livewire component as needed
    }

    

    public function totalAmount(){
        
    }

    public function addProduct()
    {
        $this->products[] = [
            'id' => '',
            'quantity' => 1,
            'unit_price' => 0,
        ];
    }

    public function removeProduct($index)
    {
        unset($this->products[$index]);
        $this->products = array_values($this->products);
    }
}