<?php

namespace App\Http\Livewire\Suppliers;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Supplier;
use Livewire\WithFileUploads;

class EditSupplier extends Component
{
    use WithFileUploads;

    public $supplier;
    public $name, $email, $address, $phone, $slug, $status;
    public $open = false;

    protected $rules = [
        'name'    => 'required|max:50',
        'email'   => 'nullable|email',
        'address' => 'nullable|string',
        'phone'   => 'nullable|string',
        'slug'    => 'required',
        'status'  => 'required|in:Activo,Inactivo',
    ];

    public function mount(Supplier $supplier)
    {
        $this->supplier = $supplier;
        $this->name = $supplier->name;
        $this->email = $supplier->email;
        $this->address = $supplier->address;
        $this->phone = $supplier->phone;
        $this->slug = $supplier->slug;
        $this->status = $supplier->status;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate();

        // Actualizar el proveedor en la base de datos
        $this->supplier->update([
            'name'    => $this->name,
            'email'   => $this->email,
            'address' => $this->address,
            'phone'   => $this->phone,
            'slug'    => $this->slug,
            'status'  => $this->status,
        ]);

        // Cerrar el modal después de actualizar
        $this->open = false;

        // Emitir un evento para que se actualice la lista de proveedores en la página anterior
        $this->emitTo('suppliers.index-supplier', 'render');

        // Emitir una notificación de éxito
        $this->emit('alert', '¡Proveedor Actualizado Exitosamente!');
    }

    public function render()
    {
        return view('livewire.suppliers.edit-supplier');
    }
}