<?php

namespace App\Http\Livewire\Suppliers;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Brand;
use Livewire\WithFileUploads;

class EditSupplier extends Component
{
    use WithFileUploads;

    public $supplier, $brands, $categories;
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

    public function mount(Supplier $supplier)
    {
        $this->supplier = $supplier;
        $this->brands = Brand::get(['id', 'name']);
        $this->categories = Category::get(['id', 'name']);
        $this->name = $supplier->name;
        $this->description = $supplier->description;
        $this->current_stock = $supplier->current_stock;
        $this->measurement_unit = $supplier->measurement_unit;
        $this->purchase_price = $supplier->purchase_price;
        $this->selling_price = $supplier->selling_price;
        $this->status = $supplier->status;
        $this->expiration = $supplier->expiration;
        $this->observations = $supplier->observations;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate();

        // Actualizar el suppliero en la base de datos
        $this->supplier->update([
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
            $image_url = $this->image->store('suppliers');
            $this->supplier->update(['image' => $image_url]);
        }

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