<?php

namespace App\Http\Livewire\Suppliers;

use Livewire\Component;
use App\Models\Supplier;
use Livewire\WithFileUploads;

class EditSupplier extends Component
{
    use WithFileUploads;

    public $supplier;
    public  $document, $name, $email, $address, $phone, $slug, $status, $image;
    public $open_edit = false;

    protected $rules = [
        'document'           => 'required',
        'name'                => 'nullable|max:50',
        'email'               => 'nullable|email',
        'address'             => 'nullable',
        'phone'               => 'nullable',
        'status'              => 'nullable',
        'image'               => 'nullable|image|max:2048',
    ];

    public function mount(Supplier $supplier)
    {
        $this->supplier = $supplier;
        $this->document = $supplier->document;
        $this->name     = $supplier->name;
        $this->email    = $supplier->email;
        $this->address  = $supplier->address;
        $this->phone    = $supplier->phone;
        $this->status   = $supplier->status;
    }

    public function update()
    {
        $this->validate();

        // Actualizar el cliente en la base de datos
        $this->supplier->update([
            'document' => $this->document,
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'phone' => $this->phone,
            'status' => $this->status,
        ]);

        if ($this->image) {
            // Actualizar la imagen si se ha cargado una nueva
            $image_url = $this->image->store('suppliers');
            $this->supplier->update(['image' => $image_url]);
        }

        $this->open_edit = false;
        $this->emitTo('suppliers.index-supplier', 'render');
        $this->emit('alert', '¡Proveedor Actualizado Exitosamente!');
    }
    public function render()
    {
        return view('livewire.suppliers.edit-supplier');
    }
}
