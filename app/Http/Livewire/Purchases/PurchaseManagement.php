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
    public $totalAmount = 0;
    public $invoiceNumber;
    public $products = [];
    public $availableProducts = [];
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $open = false;
    public $openConfirmingPurchase = false;
    public $selectedPurchase = null;

    public function sortField($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function showPurchaseDetails($purchaseId)
    {
        $this->selectedPurchase = Purchase::find($purchaseId);
        $this->open = true;
    }

    public function closePurchaseDetailsModal()
    {
        $this->selectedPurchase = null;
        $this->open = false;
    }

    public function render()
    {
        $purchases = Purchase::orderBy($this->sortBy, $this->sortDirection)->paginate(10);
        $suppliers = Supplier::all();
        $allProducts = Product::all();

        if ($this->supplierId) {
            $selectedSupplier = Supplier::find($this->supplierId);
            $this->availableProducts = $selectedSupplier->products;
        }

        return view('livewire.purchases.purchase-management', [
            'purchases' => $purchases,
            'suppliers' => $suppliers,
            'allProducts' => $allProducts,
        ]);
    }
    public function addProduct()
    {
        if ($this->validateSupplierAndInvoice()) {

            foreach ($this->products as $product) {
                if (empty($product['id'])) {
                    session()->flash('error', 'Por favor ingresa la información del producto antes de agregar uno nuevo.');
                    return;
                }
            }

            $this->products[] = [
                'id' => '',
                'quantity' => 0,
                'unit_price' => 0,
                'subtotal' => 0,
            ];
        }
    }
    private function validateSupplierAndInvoice()
    {
        if (!$this->supplierId || !$this->invoiceNumber) {
            session()->flash('error', 'Por favor ingresa la información del proveedor y la factura antes de continuar.');
            return false;
        }

        // Verifica si el número de factura contiene solo dígitos y no está vacío
        if (!preg_match('/^[0-9]+$/', $this->invoiceNumber)) {
            session()->flash('error', 'El número de factura solo debe contener dígitos (0-9).');
            return false;
        }
        $existingInvoice = Purchase::where('invoice_number', $this->invoiceNumber)->exists();
        if ($existingInvoice) {
            session()->flash('error', 'El número de factura ya existe. Por favor ingresa otro número.');
            return false;
        }

        return true;
    }

    public function submitPurchase()
    {
        $this->totalAmount = 0;
        $purchaseDetails = [];

        foreach ($this->products as $product) {
            $productInfo = Product::find($product['id']);
            $unitPrice = $productInfo->purchase_price;
            $subtotal = $product['quantity'] * $unitPrice;

            $purchaseDetails[] = [
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
                'unit_price' => $unitPrice,
                'subtotal' => $subtotal,
            ];

            $this->totalAmount += $subtotal;
        }

        $purchase = Purchase::create([
            'user_id' => Auth::id(),
            'supplier_id' => $this->supplierId,
            'invoice_number' => $this->invoiceNumber,
            'total_amount' => $this->totalAmount,
            'purchase_date' => now(),
        ]);

        $purchase->purchaseDetails()->createMany($purchaseDetails);

        $this->resetForm();
        $this->openConfirmingPurchase = false;
    }
    public function removeProduct($index)
    {
        unset($this->products[$index]);
        $this->products = array_values($this->products);
        $this->calculateTotalAmount();
    }

    public function updatedProducts()
    {
        $this->calculateTotalAmount();
    }

    private function calculateTotalAmount()
    {
        $this->totalAmount = 0;

        foreach ($this->products as $index => $product) {
            $productInfo = Product::find($product['id']);
            $unitPrice = $productInfo->purchase_price;
            $subtotal = $product['quantity'] * $unitPrice;

            $this->products[$index]['unit_price'] = $unitPrice;
            $this->products[$index]['subtotal'] = $subtotal;

            $this->totalAmount += $subtotal;
        }
    }

    private function validateOpenConfirmingPurchase()
    {
        if ($this->products == null) {
            session()->flash('error', 'Por favor ingresa un producto antes de realizar el registro de la compra.');
        } else {
            foreach ($this->products as $product) {
                if (empty($product['id'])) {
                    session()->flash('error', 'Por favor ingresa un producto antes de realizar el registro de la compra.');
                    $this->openConfirmingPurchase = false;
                    return;
                } elseif ($product['quantity'] == 0) {
                    session()->flash('error', 'Por favor ingresa la cantidad del producto antes de realizar el registro de la compra.');
                    $this->openConfirmingPurchase = false;
                } else {
                    $this->openConfirmingPurchase = true;
                }
            }
        }
    }

    public function confirmPurchase()
    {
        if ($this->validateSupplierAndInvoice() && $this->validateOpenConfirmingPurchase()) {
            return true;
        }
    }
    private function validateProducts()
    {
        foreach ($this->products as $product) {
            if (empty($product['id']) || $product['quantity'] <= 0) {
                session()->flash('error', 'Por favor ingresa la información del producto antes de agregar uno nuevo.');
                return false;
            }
        }
        return true;
    }



    private function resetForm()
    {
        $this->supplierId = null;
        $this->invoiceNumber = null;
        $this->products = [];
        $this->availableProducts = [];
        $this->totalAmount = 0;
    }
}
