<?php 
namespace App\Http\Livewire\Sales;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Customer;
use App\Models\Sale;
use App\Models\Product;

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

    public function submitSale()
    {
        $this->validate([
            'customerId' => 'required|exists:customers,id',
            'invoiceNumber' => 'required|unique:sales,invoice_number',
        ]);

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

    public function addProduct()
    {
        $this->products[] = [
            'id' => '',
            'quantity' => 1,
            'unit_price' => 0,
            'subtotal' => 0,
        ];
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
        $this->openConfirmingSale = true;
    }

    private function resetForm()
    {
        $this->customerId = null;
        $this->invoiceNumber = null;
        $this->products = [];
        $this->totalAmount = 0;
    }
}
