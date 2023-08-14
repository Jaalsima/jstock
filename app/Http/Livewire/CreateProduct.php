<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;

    public$brands, $categories, $product, $unique_input_identifier; 
    public  $brand_id, $category_id, $name, $description, $purchase_price, $selling_price, $status, $image;
    public $open =false;

    protected $rules = [
        'brand_id'       => 'required|exists:brands,id',
        'category_id'    => 'required|exists:categories,id',
        'name'           => 'required|string|max:255',
        'description'    => 'nullable|string',
        'purchase_price' => 'required|numeric|min:0',
        'selling_price'  => 'required|numeric|min:0',
        'status'         => 'required|in:Disponible,No Disponible,En Espera',
        'image'          => 'nullable|image|max:2048',
    ];

    public function mount()
    {
        $this->brands = Brand::get(['id', 'name']);
        $this->categories = Category::get(['id', 'name']);
        $this->product = Product::all();
        $this->unique_input_identifier = rand();
    }
    // public function updated($propertyName){
    //     $this->validateOnly($propertyName);
    // }

    public function add(){

        $this->validate();

        $image_url = $this->image->store('products');
        
        Product::create([            
            'brand_id'       => $this->brand_id,
            'category_id'    => $this->category_id,
            'name'           => $this->name,
            'description'    => $this->description,
            'purchase_price' => $this->purchase_price,
            'selling_price'  => $this->selling_price,
            'status'         => $this->status,
            'image'          => $image_url,
        ]);

        $this->reset(['open', 'name', 'description', 'category_id', 'brand_id', 'purchase_price', 'selling_price', 'status', 'image']);
        $this->unique_input_identifier = rand();
        $this->emitTo('product-table', 'render');
        $this->emit('alert', '¡Producto Creado Exitosamente!');

    }

    public function render()
    {
        return view('livewire.create-product');
    }
}
