<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateProduct extends Component
{

    public $open =false;

    public function render()
    {
        return view('livewire.create-product');
    }
}