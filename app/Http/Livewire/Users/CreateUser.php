<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Component
{
    use WithFileUploads;

    public $open_create = false;
    public $user, $document, $name, $email, $address, $phone, $password, $slug, $status, $profile_photo_path;

    protected $rules = [
        'document'            => 'nullable',
        'name'                => 'required|max:50',
        'email'               => 'required|email',
        'address'             => 'nullable',
        'phone'               => 'nullable',
        'password'            => 'nullable',
        'status'              => 'nullable',
        'profile_photo_path'  => 'nullable|image|max:2048',
    ];

    public function create_user(){
        
        $this->validate();

        if($this->profile_photo_path){
            $image_url = $this->profile_photo_path->store('users');
        }else{
            $image_url = null;
        }

        User::create([
        'document'            => $this->document,
        'name'                => $this->name,
        'email'               => $this->email,
        'address'             => $this->address,
        'phone'               => $this->phone,
        'password'            => Hash::make($this->password),
        'slug'                => Str::slug($this->name),
        'status'              => $this->status,
        'profile_photo_path'  => $image_url,

        ]);

        $this->reset('document', 'name', 'email', 'address', 'phone', 'password', 'slug', 'status', 'profile_photo_path');
        $this->open_create = false;
        $this->emitTo('users.index-user', 'render');
        $this->emit('alert', '¡Usuario Creado Exitosamente!');
    }

    public function render()
    {
        return view('livewire.users.create-user');
    }
}



