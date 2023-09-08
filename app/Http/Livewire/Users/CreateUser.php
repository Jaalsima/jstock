<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\User;
use Livewire\WithFileUploads;

class CreateUser extends Component
{
    use WithFileUploads;

    public $user, $unique_input_identifier;
    public $document, $name, $email, $address, $phone, $password, $slug, $status, $profile_photo_path;
    public $open = false;

    protected $rules = [
        'document'           => 'nullable|string|max:50',
        'name'               => 'nullable|string|max:50',
        'email'              => 'nullable|email|unique:users|max:50',
        'address'            => 'nullable|string|max:50',
        'phone'              => 'nullable|string|max:20',
        'password'           => 'nullable|string|min:8|max:50',
        'status'             => 'nullable|in:Activo,Inactivo',
        'profile_photo_path' => 'nullable|image|max:2048',
    ];

    public function mount()
    {
        $this->user = User::all();
        $this->unique_input_identifier = rand();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $this->validate();

        $image_url = $this->profile_photo_path->store('users');

        User::create([
            'document'           => $this->document,
            'name'               => $this->name,
            'email'              => $this->email,
            'address'            => $this->address,
            'phone'              => $this->phone,
            'password'           => bcrypt($this->password), // Hash the password for security
            'slug'               => Str::slug($this->name),
            'status'             => $this->status,
            'profile_photo_path' => $image_url,
        ]);

        $this->reset(['open', 'document', 'name', 'email', 'address', 'phone', 'password', 'slug', 'status', 'profile_photo_path']);
        $this->unique_input_identifier = rand();
        $this->emitTo('users.list-user', 'render');
        $this->emit('alert', '¡Usuario Creado Exitosamente!');
    }

    public function render()
    {
        return view('livewire.users.create-user');
    }
}