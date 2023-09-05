<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class ListUser extends Component
{
    use WithPagination;

    public $searchu, $user;
    public $sort = "id";
    public $direction = "desc";
    public $open = false;
    protected $listeners = ['render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->searchu . '%')
            ->orWhere('email', 'like', '%' . $this->searchu . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate(10);

        return view('livewire.users.list-user', compact('users'));
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            $this->direction = ($this->direction == "desc") ? "asc" : "desc";
        } else {
            $this->sort = $sort;
            $this->direction = "asc";
        }
    }

    public function confirmDelete($userId)
    {
        $this->user = User::find($userId);
        $this->open = true; // Abre el modal de confirmación
    }

    public function deleteConfirmed()
    {
        if ($this->user) {
            $this->user->delete();
            $this->emitUp('users.list-user', 'render');
            $this->emit('alert', '¡Usuario Eliminado Exitosamente!');
        }
        $this->open = false; // Cierra el modal de confirmación
    }
}