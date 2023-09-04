<?php

namespace App\Http\Livewire\Customers;

use Livewire\Component;
use App\Models\Customer;
use Livewire\WithPagination;

class IndexCustomer extends Component
{
    use WithPagination;

    public $search, $customer;
    public $sort = "id";
    public $direction = "desc";
    public $open = false;
    protected $listeners = ['render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $customers = Customer::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate(10);

        return view('livewire.customers.index-customer', compact('customers'));
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            $this->direction = ($this->direction == "desc") ? "asc" : "desc";
        } else {
            $this->sort = $sort;
            $this->direction = "asc";
        }
    }

    public function confirmDelete($customerId)
    {
        $this->customer = Customer::find($customerId);
        $this->open = true; // Abre el modal de confirmación
    }

    public function deleteConfirmed()
    {
        if ($this->customer) {
            $this->customer->delete();
            $this->emitTo('customers.index-customer', 'render');
            $this->emit('alert', '¡Cliente Eliminado!');
        }
        $this->open = false; // Cierra el modal de confirmación
    }
}