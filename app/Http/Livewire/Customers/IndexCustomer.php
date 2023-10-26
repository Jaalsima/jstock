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
    public $perPage = 10;
    public $open = false;
    protected $listeners = ['render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $query = Customer::query();

        if ($this->search) {
            $query->where('id', 'like', '%' . $this->search . '%')
                ->orWhere('name', 'like', '%' . $this->search . '%')
                ->orWhere('document', 'like', '%' . $this->search . '%');
        }
        $customers = $query->orderBy($this->sort, $this->direction)
            ->paginate($this->perPage);

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
            $this->emitTo('index-customer', 'render');
            $this->emit('alert', '¡Cliente Eliminado!');
        }
        $this->open = false; // Cierra el modal de confirmación
    }
}
