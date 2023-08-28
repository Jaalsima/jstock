<?php

namespace App\Http\Livewire\Customers;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Brand;
use Livewire\WithFileUploads;

class EditCustomer extends Component
{
    use WithFileUploads;

    public $customer, $brands, $categories;
    public $name, $description, $current_stock, $measurement_unit, $purchase_price, $selling_price, $status, $expiration, $observations, $image;
    public $open = false;

    protected $rules = [
        'name'              => 'required|max:50',
        'description'       => 'nullable|string',
        'current_stock'     => 'required|integer|min:0',
        'measurement_unit'  => 'nullable|string',
        'purchase_price'    => 'required|numeric|min:0',
        'selling_price'     => 'required|numeric|min:0',
        'status'            => 'required|in:Disponible,No Disponible',
        'expiration'        => 'nullable|date',
        'observations'      => 'nullable|string',
        'image'             => 'nullable|image|max:2048', // Opcional: Puedes permitir actualizar la imagen
    ];

    public function mount(Customer $customer)
    {
        $this->customer = $customer;
        $this->brands = Brand::get(['id', 'name']);
        $this->categories = Category::get(['id', 'name']);
        $this->name = $customer->name;
        $this->description = $customer->description;
        $this->current_stock = $customer->current_stock;
        $this->measurement_unit = $customer->measurement_unit;
        $this->purchase_price = $customer->purchase_price;
        $this->selling_price = $customer->selling_price;
        $this->status = $customer->status;
        $this->expiration = $customer->expiration;
        $this->observations = $customer->observations;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate();

        // Actualizar el customero en la base de datos
        $this->customer->update([
            'name' => $this->name,
            'description' => $this->description,
            'current_stock' => $this->current_stock,
            'measurement_unit' => $this->measurement_unit,
            'purchase_price' => $this->purchase_price,
            'selling_price' => $this->selling_price,
            'status' => $this->status,
            'expiration' => $this->expiration,
            'observations' => $this->observations,
        ]);

        if ($this->image) {
            // Actualizar la imagen si se ha cargado una nueva
            $image_url = $this->image->store('customers');
            $this->customer->update(['image' => $image_url]);
        }

        // Cerrar el modal después de actualizar
        $this->open = false;

        // Emitir un evento para que se actualice la lista de customeros en la página anterior
        $this->emitTo('customers.index-customer', 'render');

        // Emitir una notificación de éxito
        $this->emit('alert', '¡Cliente Actualizado Exitosamente!');
    }

    public function render()
    {
        return view('livewire.customers.edit-customer');
    }
}