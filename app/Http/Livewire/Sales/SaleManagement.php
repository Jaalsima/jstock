<?php

namespace App\Http\Livewire\Sales;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;

class SaleManagement extends Component
{
    public $customerId;
    public $totalAmount = 0;
    public $invoiceNumber;
    public $products = [];
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $open = false;
    public $openConfirmingSale = false;
    public $selectedSale = null;

    public function sortField($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function showSaleDetails($saleId)
    {
        $this->selectedSale = Sale::find($saleId);
        $this->open = true;
    }

    public function closeSaleDetailsModal()
    {
        $this->selectedSale = null;
        $this->open = false;
    }

    public function render()
    {
        $sales = Sale::orderBy($this->sortBy, $this->sortDirection)->paginate(10);
        $customers = Customer::all();
        $allProducts = Product::all();
        return view('livewire.sales.sale-management', [
            'sales' => $sales,
            'customers' => $customers,
            'allProducts' => $allProducts,
        ]);
    }

    public function addProduct()
    {
        if ($this->validateCustomerAndInvoice()) {

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

    private function validateCustomerAndInvoice()
    {
        if (!$this->customerId || !$this->invoiceNumber) {
            session()->flash('error', 'Por favor ingresa la información del cliente y la factura antes de continuar.');
            return false;
        }
        // Verifica si el número de factura contiene solo dígitos y no está vacío
        if (!preg_match('/^[0-9]+$/', $this->invoiceNumber)) {
            session()->flash('error', 'El número de factura solo debe contener dígitos (0-9).');
            return false;
        }
        $existingInvoice = Sale::where('invoice_number', $this->invoiceNumber)->exists();
        if ($existingInvoice) {
            session()->flash('error', 'El número de factura ya existe. Por favor ingresa otro número.');
            return false;
        }
        return true;
    }
    public function submitSale()
    {
        $this->totalAmount = 0;
        $saleDetails = [];
        foreach ($this->products as $product) {
            $productInfo = Product::find($product['id']);
            $unitPrice = $productInfo->selling_price;
            $subtotal = $product['quantity'] * $unitPrice;
            $saleDetails[] = [
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
                'unit_price' => $unitPrice,
                'subtotal' => $subtotal,
            ];
            $this->totalAmount += $subtotal;
        }
        $sale = Sale::create([
            'user_id' => Auth::id(),
            'customer_id' => $this->customerId,
            'invoice_number' => $this->invoiceNumber,
            'total_amount' => $this->totalAmount,
            'sale_date' => now(),
        ]);
        $sale->saleDetails()->createMany($saleDetails);
        $this->resetForm();
        $this->openConfirmingSale = false;
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
            $unitPrice = $productInfo->selling_price;
            $subtotal = $product['quantity'] * $unitPrice;
            $this->products[$index]['unit_price'] = $unitPrice;
            $this->products[$index]['subtotal'] = $subtotal;
            $this->totalAmount += $subtotal;
        }
    }

    public function confirmSale()
    {
        if ($this->validateCustomerAndInvoice() && $this->validateOpenConfirmingSale()) {
            return true;
        }
    }

    private function validateOpenConfirmingSale()
    {
        if ($this->products == null) {
            session()->flash('error', 'Por favor ingresa un producto antes de realizar el registro de la venta.');
        } else {
            foreach ($this->products as $product) {
                if (empty($product['id'])) {
                    session()->flash('error', 'Por favor ingresa un producto antes de realizar el registro de la venta.');
                    $this->openConfirmingSale = false;
                    return;
                } elseif ($product['quantity'] == 0) {
                    session()->flash('error', 'Por favor ingresa la cantidad del producto antes de realizar el registro de la venta.');
                    $this->openConfirmingSale = false;
                    return;
                } else {
                    $this->openConfirmingSale = true;
                }
            }
        }
    }
    private function validateProducts()
    {
        foreach ($this->products as $product) {
            if (empty($product['id'])) {
                session()->flash('error', 'Por favor ingresa la información correspondiente para el producto.');
                return false;
            }
            if ($product['quantity'] <= 0) {
                session()->flash('error', 'Por favor ingresa la cantidad del producto.');
                return false;
            }
        }
        return true;
    }

    private function resetForm()
    {
        $this->customerId = null;
        $this->invoiceNumber = null;
        $this->products = [];
        $this->totalAmount = 0;
    }
}
