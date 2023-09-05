<?php

namespace App\Http\Livewire\Customers;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Customer;
use Livewire\WithFileUploads;

class CreateCustomer extends Component
{
    use WithFileUploads;

    public $name, $email, $address, $phone, $status, $image;
    public $open = false;

    protected $rules = [
        'name' => 'required|max:50',
        'email' => 'nullable|email',
        'address' => 'nullable|string',
        'phone' => 'nullable|string',
        'slug' => 'required',
        'status' => 'required|in:Activo,Inactivo',
        'image' => 'nullable|image|max:2048',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $this->validate();

        $image_url = null;

        if ($this->image) {
            $image_url = $this->image->store('customers');
        }

        Customer::create([
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'phone' => $this->phone,
            'slug'   => Str::slug($this->name),
            'status' => $this->status,
            'image' => $image_url,
        ]);

        $this->reset(['open', 'name', 'email', 'address', 'phone', 'slug', 'status', 'image']);
        $this->emitTo('customers.index-customer', 'render');
        $this->emit('alert', '¡Cliente Creado Exitosamente!');
    }

    public function render()
    {
        return view('livewire.customers.create-customer');
    }
}