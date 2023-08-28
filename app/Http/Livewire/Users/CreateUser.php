<?php

namespace App\Http\Livewire\users;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\User;
use Livewire\WithFileUploads;

class CreateUser extends Component
{
    use WithFileUploads;

    public $user, $unique_input_identifier;
    public $document, $name, $email, $address, $phone, $password, $slug, $status, $profile_photo_path;
    public $open =false;

    protected $rules = [
        'document'           => 'required|string|max:50',
        'name'               => 'required|string|max:50',
        'email'              => 'required|email|unique:users|max:50',
        'address'            => 'nullable|string|max:50',
        'phone'              => 'nullable|string|max:20',
        'password'           => 'required|string|min:8|max:50',
        'status'             => 'required|in:Activo,Inactivo',
        'profile_photo_path'  => 'required|image|max:2048',
    ];
    

    public function mount()
    {
        $this->user = User::all();
        $this->unique_input_identifier = rand();
    }
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function add(){

        $this->validate();

        $image_url = $this->profile_photo_path->store('users');

        User::create([
            'document'           => $this->document,
            $name = 'name'       => $this->name,
            'email'              => $this->email,
            'address'            => $this->address,
            'phone'              => $this->phone,
            'password'           => $this->password,
            'slug'               => Str::slug($name),
            'status'             => $this->status,
            'profile_photo_path' => $image_url,
        ]);

        $this->reset(['open', 'document', 'name', 'email', 'address', 'phone', 'password', 'slug', 'status', 'profile_photo_path']);
        $this->unique_input_identifier = rand();
        $this->emitTo('users.index-user', 'render');
        $this->emit('alert', '¡Usuario Creado Exitosamente!');

    }

    public function render()
    {
        return view('livewire.users.create-user');
    }
}