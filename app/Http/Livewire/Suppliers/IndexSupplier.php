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
    public $perPage = 10;
    public $open = false;
    protected $listeners = ['render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $query = Supplier::query();

        if ($this->search) {
            $query->where('id', 'like', '%' . $this->search . '%')
                ->orWhere('name', 'like', '%' . $this->search . '%')
                ->orWhere('document', 'like', '%' . $this->search . '%');
        }
        $suppliers = $query->orderBy($this->sort, $this->direction)
            ->paginate($this->perPage);

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
            $this->emitTo('index-supplier', 'render');
            $this->emit('alert', '¡Proveedor Eliminado!');
        }
        $this->open = false; // Cierra el modal de confirmación
    }
}
