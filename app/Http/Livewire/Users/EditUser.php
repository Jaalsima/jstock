<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Category;
use App\Models\Brand;
use Livewire\WithFileUploads;

class EditUser extends Component
{
    use WithFileUploads;

    public $user, $brands, $categories;
    public $name, $description, $current_stock, $measurement_unit, $purchase_price, $selling_price, $status, $expiration, $observations, $profile_photo_path;
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
        'profile_photo_path'             => 'nullable|profile_photo_path|max:2048', // Opcional: Puedes permitir actualizar la imagen
    ];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->brands = Brand::get(['id', 'name']);
        $this->categories = Category::get(['id', 'name']);
        $this->name = $user->name;
        $this->description = $user->description;
        $this->current_stock = $user->current_stock;
        $this->measurement_unit = $user->measurement_unit;
        $this->purchase_price = $user->purchase_price;
        $this->selling_price = $user->selling_price;
        $this->status = $user->status;
        $this->expiration = $user->expiration;
        $this->observations = $user->observations;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate();

        // Actualizar el usero en la base de datos
        $this->user->update([
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

        if ($this->profile_photo_path) {
            // Actualizar la imagen si se ha cargado una nueva
            $image_url = $this->profile_photo_path->store('users');
            $this->user->update(['profile_photo_path' => $image_url]);
        }

        // Cerrar el modal después de actualizar
        $this->open = false;

        // Emitir un evento para que se actualice la lista de useros en la página anterior
        $this->emitTo('users.index-user', 'render');

        // Emitir una notificación de éxito
        $this->emit('alert', '¡usero Actualizado Exitosamente!');
    }

    public function render()
    {
        return view('livewire.users.edit-user');
    }
}