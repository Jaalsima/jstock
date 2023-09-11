<?php

namespace App\Http\Livewire\Purchases;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Product;

class PurchaseManagement extends Component
{
    public $supplierId;
    public $invoiceNumber;
    public $totalAmount;
    public $products = [];
    public $availableProducts = [];

    public function render()
    {
        $purchases = Purchase::orderBy('created_at', 'desc')->get();
        $suppliers = Supplier::all();
        $allProducts = Product::all();

        if ($this->supplierId) {
            // Productos asociados al proveedor seleccionado
            $selectedSupplier = Supplier::find($this->supplierId);
            $this->availableProducts = $selectedSupplier->products;
        }

        return view('livewire.purchases.purchase-management', [
            'purchases' => $purchases,
            'suppliers' => $suppliers,
            'allProducts' => $allProducts,
        ]);
    }

    public function submitPurchase()
    {
        $this->validate([
            'supplierId' => 'required|exists:suppliers,id',
            'invoiceNumber' => 'required|unique:purchases,invoice_number',
            'totalAmount' => 'required|numeric',
        ]);

        $purchase = Purchase::create([
            'user_id' => Auth::id(),
            'supplier_id' => $this->supplierId,
            'invoice_number' => $this->invoiceNumber,
            'total_amount' => $this->totalAmount,
            'purchase_date' => now(),
        ]);

        // Asignación de productos a la compra y cálculo del subtotal.
        foreach ($this->products as $product) {
            $subtotal = $product['quantity'] * $product['unit_price'];
            $purchaseDetail = [
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
                'unit_price' => $product['unit_price'],
                'subtotal' => $subtotal,
            ];

            $purchase->purchaseDetails()->create($purchaseDetail);
        }

        // Clear form fields or perform any other necessary actions

        // Redirect or update the Livewire component as needed
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