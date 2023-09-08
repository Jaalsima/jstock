<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;

class EditUser extends Component
{
    use WithFileUploads;

    public $user;
    public $document, $name, $email, $address, $phone, $password, $status, $profile_photo_path;
    public $open_edit = false;

    protected $rules = [
        'document'           => 'required',
        'name'               => 'required|max:50',
        'email'              => 'required|email',
        'address'            => 'required',
        'phone'              => 'required',
        'password'           => 'required',
        'status'             => 'required',
        'profile_photo_path' => 'nullable|image|max:2048',
    ];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->document = $user->document;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->address = $user->address;
        $this->phone = $user->phone;
        $this->password = $user->password;
        $this->status = $user->status;
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

        $this->open_edit = false;
        $this->emitTo('users.index-user', 'render');
        $this->emit('alert', '¡Usuario Actualizado Exitosamente!');
    }

    public function render()
    {
        return view('livewire.users.edit-user');
    }
}