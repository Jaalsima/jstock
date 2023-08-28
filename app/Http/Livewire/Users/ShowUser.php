<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use App\Models\Brand;
use App\Models\Category;

class ShowUser extends Component
{
    public $user, $brands, $categories;
    public $open =false;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->brands = Brand::get(['id', 'name']);
        $this->categories = Category::get(['id', 'name']);
    }



    public function render()
    {
        return view('livewire.users.show-user');
    }
}