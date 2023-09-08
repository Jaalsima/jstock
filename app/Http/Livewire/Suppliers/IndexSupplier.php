<?php

namespace App\Http\Livewire\Suppliers;

use Livewire\Component;
use App\Models\Supplier;
use Livewire\WithPagination;

class IndexSupplier extends Component
{
    use WithPagination;

    public $search, $supplier;
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
        $suppliers = Supplier::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate(10);

        return view('livewire.suppliers.index-supplier', compact('suppliers'));
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

    public function confirmDelete($supplierId)
    {
        $this->supplier = Supplier::find($supplierId);
        $this->open = true; // Abre el modal de confirmación
    }

    public function deleteConfirmed()
    {
        if ($this->supplier) {
            $this->supplier->delete();
            $this->emitTo('suppliers.index-supplier', 'render');
            $this->emit('alert', '¡Proveedor Eliminado!');
        }
        $this->open = false; // Cierra el modal de confirmación
    }
}