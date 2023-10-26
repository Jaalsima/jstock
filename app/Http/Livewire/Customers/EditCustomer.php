<?php

namespace App\Http\Livewire\Customers;

use Livewire\Component;
use App\Models\Customer;
use Livewire\WithFileUploads;

class EditCustomer extends Component
{
    use WithFileUploads;

    public $customer;
    public $document, $name, $email, $address, $phone, $slug, $status, $image;
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

    public function mount(Customer $customer)
    {
        $this->customer = $customer;
        $this->document = $customer->document;
        $this->name     = $customer->name;
        $this->email    = $customer->email;
        $this->address  = $customer->address;
        $this->phone    = $customer->phone;
        $this->status   = $customer->status;
    }

    public function update()
    {
        $this->validate();

        // Actualizar el cliente en la base de datos
        $this->customer->update([
            'document' => $this->document,
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'phone' => $this->phone,
            'status' => $this->status,
        ]);

        if ($this->image) {
            // Actualizar la imagen si se ha cargado una nueva
            $image_url = $this->image->store('customers');
            $this->customer->update(['image' => $image_url]);
        }

        $this->open_edit = false;
        $this->emitTo('customers.index-customer', 'render');
        $this->emit('alert', '¡Cliente Actualizado Exitosamente!');
    }
    public function render()
    {
        return view('livewire.customers.edit-customer');
    }
}
