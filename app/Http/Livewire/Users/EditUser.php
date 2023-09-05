<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\User;
use Livewire\WithFileUploads;

class EditUser extends Component
{
    use WithFileUploads;

    public $user, $document, $name, $email, $address, $phone, $password, $status, $profile_photo_path;
    public $open = false;

    protected $rules = [
        'document'           => 'required|string|max:50',
        'name'               => 'required|string|max:50',
        'email'              => 'required|email|unique:users|max:50',
        'address'            => 'nullable|string|max:50',
        'phone'              => 'nullable|string|max:20',
        'password'           => 'required|string|min:8|max:50',
        'status'             => 'required|in:Activo,Inactivo',
        'profile_photo_path' => 'nullable|image|max:2048', // Opcional: Se puede permitir actualizar la imagen
    ];

    public function mount(User $user)
    {
        $this->user       = $user;
        $this->document   = $user->document;
        $this->name       = $user->name;
        $this->email      = $user->email;
        $this->address    = $user->address;
        $this->phone      = $user->phone;
        $this->password   = $user->password;
        $this->status     = $user->status;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate();

        // Actualizar el usuario en la base de datos
        $this->user->update([
            'document' => $this->document,
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'phone' => $this->phone,
            'password' => $this->password,
            'status' => $this->status,
        ]);

        if ($this->profile_photo_path) {
            // Actualizar la imagen si se ha cargado una nueva
            $image_url = $this->profile_photo_path->store('users');
            $this->user->update(['profile_photo_path' => $image_url]);
        }

        // Cerrar el modal después de actualizar
        $this->open = false;

        // Emitir un evento para que se actualice la lista de useros en la página anterior
        $this->emitTo('users.list-user', 'render');

        // Emitir una notificación de éxito
        $this->emit('alert', '¡Usuario Actualizado Exitosamente!');
    }

    public function render()
    {
        return view('livewire.users.edit-user');
    }
}