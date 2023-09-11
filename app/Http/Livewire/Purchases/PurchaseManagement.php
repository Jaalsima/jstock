<?php

namespace App\Http\Livewire\Purchases;

use Livewire\Component;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseDetail;

class PurchaseManagement extends Component
{
    public $isOpen = false;
    public $supplier_id;
    public $purchase_date;
    public $invoice_number;
    public $total_amount;
    public $product_id;
    public $quantity;
    public $unit_price;
    public $availableProducts = []; // Nueva variable para almacenar los productos del proveedor seleccionado

    public function render()
    {
        $suppliers = Supplier::all();
        $products = Product::all();

        return view('livewire.purchases.purchase-management', compact('suppliers', 'products'));
    }

    public function updatedSupplierId()
    {
        // Cargar los productos asociados al proveedor seleccionado
        $supplier = Supplier::find($this->supplier_id);
        $this->availableProducts = $supplier ? $supplier->products : [];
    }

    public function openPurchaseModal()
    {
        $this->isOpen = true;
    }

    public function closePurchaseModal()
    {
        $this->isOpen = false;
        $this->resetForm();
        $this->emit('closePurchaseModal'); // Agrega esta línea para emitir el evento
    }

    public function savePurchase()
    {
        $this->validate([
            'supplier_id' => 'required',
            'purchase_date' => 'required|date',
            'invoice_number' => 'required|unique:purchases',
            'total_amount' => 'required|numeric',
            'product_id' => 'required',
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0.01',
        ]);

        // Crear la compra
        $purchase = Purchase::create([
            'supplier_id' => $this->supplier_id,
            'user_id' => auth()->user()->id, // Supongamos que el usuario autenticado realiza la compra
            'purchase_date' => $this->purchase_date,
            'invoice_number' => $this->invoice_number,
            'total_amount' => $this->total_amount,
        ]);

        // Crear el detalle de compra
        PurchaseDetail::create([
            'purchase_id' => $purchase->id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'unit_price' => $this->unit_price,
            'subtotal' => $this->quantity * $this->unit_price,
        ]);

        // Restablecer los campos del formulario
        $this->resetForm();

        // Emitir un evento para cerrar el modal de compra
        $this->emit('closePurchaseModal');

        // Emitir un mensaje de éxito
        session()->flash('message', 'Compra registrada exitosamente.');
    }

    private function resetForm()
    {
        $this->supplier_id = null;
        $this->purchase_date = null;
        $this->invoice_number = null;
        $this->total_amount = null;
        $this->product_id = null;
        $this->quantity = null;
        $this->unit_price = null;
        $this->availableProducts = [];
    }
}
