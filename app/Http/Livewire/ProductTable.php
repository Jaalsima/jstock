<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
class ProductTable extends Component
{

    public $search;
    public $sort ="id";
    public $direction ="desc";
    public $open = false;
    protected $listeners = ['render'];


    public function render()
    {
        $products = Product::where('name','like','%' . $this->search . '%')
                         ->orWhere('description','like','%' . $this->search . '%')
                         ->orderBy($this->sort, $this->direction)
                         ->paginate(3);

        return view('livewire.product-table', compact('products'));
    }
    public function order($sort){
        if($this->sort == $sort){
            if($this->direction == "desc"){
                $this->direction = "asc";
            }else{
                $this->direction = "desc";
            }
        }else{
            $this->sort = $sort;
            $this->direction = "asc";
        }
    }

}