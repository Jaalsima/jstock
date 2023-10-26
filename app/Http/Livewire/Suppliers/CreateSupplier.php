<?php

namespace App\Http\Livewire\Suppliers;

use Livewire\Component;
use App\Models\Supplier;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class CreateSupplier extends Component
{
    use WithFileUploads;

    public $open_create = false;
    public $supplier, $document, $name, $email, $address, $phone, $slug, $status, $image;


    protected $rules = [
        'document'            => 'required',
        'name'                => 'required|max:50',
        'email'               => 'required|email',
        'address'             => 'required',
        'phone'               => 'required',
        'status'              => 'required',
        'image'               => 'required|image|max:2048',
    ];

    public function create_supplier()
    {

        $this->validate();

        $image_url = $this->image->store('suppliers');

        Supplier::create([
            'document' => $this->document,
            'name'     => $this->name,
            'email'    => $this->email,
            'address'  => $this->address,
            'phone'    => $this->phone,
            'slug'     => Str::slug($this->name),
            'status'   => $this->status,
            'image'    => $image_url,

        ]);

        $this->reset('document', 'name', 'email', 'address', 'phone', 'slug', 'status', 'image');
        $this->open_create = false;
        $this->emitTo('suppliers.index-supplier', 'render');
        $this->emit('alert', '¡Proveedor Creado Exitosamente!');
    }
    public function render()
    {
        return view('livewire.suppliers.create-supplier');
    }
}
