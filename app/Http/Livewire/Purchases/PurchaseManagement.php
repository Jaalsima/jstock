<?php

namespace App\Http\Livewire\Purchases;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Purchase;

class PurchaseManagement extends Component
{
    public $supplierId;
    public $totalAmount = 0;
    public $invoiceNumber;
    public $products = [];
    public $invoiceDate;
    public $availableProducts = [];
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $open = false;
    public $openConfirmingPurchase = false;
    public $selectedPurchase = null;

    protected $rules = [
        'invoiceDate' => 'nullable|date|before_or_equal:today',
    ];

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

    public function addProduct()
    {
        if ($this->validateSupplierAndInvoiceInfo()) {
            foreach ($this->products as $product) {
                if (empty($product['id']) || $product['quantity'] <= 0 || $product['unit_price'] <= 0 || $product['subtotal'] <= 0) {
                    session()->flash('error', 'Por favor completa toda la información del producto antes de agregar uno nuevo.');
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
    private function validateSupplierAndInvoiceInfo()
    {
        if (!$this->supplierId || !$this->invoiceNumber || !$this->invoiceDate) {
            session()->flash('error', 'Por favor ingresa la información del proveedor, la factura y la fecha antes de continuar.');
            return false;
        }

        // Verificar si el número de factura contiene solo alfanuméricos y no está vacío
        if (!preg_match('/^[a-zA-Z0-9]+$/', $this->invoiceNumber)) {
            session()->flash('error', 'El número de factura solo debe contener caracteres alfanuméricos.');
            return false;
        }

        // Verificar si la fecha de compra es una fecha válida
        if (!strtotime($this->invoiceDate)) {
            session()->flash('error', 'La fecha de compra no es válida.');
            return false;
        }

        $existingInvoice = Purchase::where('invoice_number', $this->invoiceNumber)->exists();
        if ($existingInvoice) {
            session()->flash('error', 'El número de factura ya existe. Por favor ingresa otro número.');
            return false;
        }

        $this->validate();

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
            'purchase_date' => $this->invoiceDate,
        ]);

        $purchase->purchaseDetails()->createMany($purchaseDetails);
        foreach ($purchaseDetails as $detail) {
            $product = Product::find($detail['product_id']);
            $newQuantity = $product->current_stock + $detail['quantity'];

            $product->update([
                'current_stock' => $newQuantity,
            ]);
        }
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
            if (isset($product['id']) && !empty($product['id'])) {
                $productInfo = Product::find($product['id']);

                if ($productInfo) {
                    $unitPrice = $productInfo->purchase_price;
                    $quantity = $product['quantity'];

                    // Validar si la cantidad es un número entero válido
                    if (filter_var($quantity, FILTER_VALIDATE_INT) !== false && $quantity > 0) {
                        $subtotal = $quantity * $unitPrice;
                    } else {
                        $subtotal = 0;
                    }

                    $this->products[$index]['unit_price'] = $unitPrice;
                    $this->products[$index]['subtotal'] = $subtotal;
                    $this->totalAmount += $subtotal;
                }
            }
        }
    }

    public function confirmPurchase()
    {
        if ($this->validateSupplierAndInvoiceInfo() && $this->validateOpenConfirmingPurchase()) {
            return true;
        }
    }

    private function validateOpenConfirmingPurchase()
    {
        if ($this->products == null) {
            session()->flash('error', 'Por favor ingresa un producto antes de realizar el registro de la compra.');
            return false;
        }

        foreach ($this->products as $product) {
            if (empty($product['id'])) {
                session()->flash('error', 'Por favor ingresa un producto antes de realizar el registro de la compra.');
                $this->openConfirmingPurchase = false;
                return false;
            } elseif ($product['quantity'] <= 0 || intval($product['quantity']) != $product['quantity']) {
                session()->flash('error', 'Por favor ingresa una cantidad válida del producto antes de realizar el registro de la compra.');
                $this->openConfirmingPurchase = false;
                return false;
            } else {
                $this->openConfirmingPurchase = true;
            }
        }

        return true;
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
        $this->invoiceDate = null;
        $this->products = [];
        $this->availableProducts = [];
        $this->totalAmount = 0;
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
}