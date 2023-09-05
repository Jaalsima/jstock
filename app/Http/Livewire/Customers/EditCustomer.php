<?php

namespace App\Http\Livewire\Customers;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Customer;
use Livewire\WithFileUploads;

class EditCustomer extends Component
{
    use WithFileUploads;

    public $customer;
    public $name, $email, $address, $phone, $slug, $status, $image;
    public $open = false;

    protected $rules = [
        'name'    => 'required|max:50',
        'email'   => 'nullable|email',
        'address' => 'nullable|string',
        'phone'   => 'nullable|string',
        'slug'    => 'required',
        'status'  => 'required|in:Activo,Inactivo',
        'image'   => 'required|image|max:2048',
    ];

    public function mount(Customer $customer)
    {
        $this->customer = $customer;
        $this->name = $customer->name;
        $this->email = $customer->email;
        $this->address = $customer->address;
        $this->phone = $customer->phone;
        $this->slug = $customer->slug;
        $this->status = $customer->status;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate();

        // Actualizar el cliente en la base de datos
        $this->customer->update([
            'name'    => $this->name,
            'email'   => $this->email,
            'address' => $this->address,
            'phone'   => $this->phone,
            'slug'    => $this->slug,
            'status'  => $this->status,
        ]);

        // Cerrar el modal después de actualizar
        $this->open = false;

        // Emitir un evento para que se actualice la lista de clientes en la página anterior
        $this->emitUp('customers.index-customer', 'render');

        // Emitir una notificación de éxito
        $this->emit('alert', '¡Cliente Actualizado Exitosamente!');
    }

    public function render()
    {
        return view('livewire.customers.edit-customer');
    }
}