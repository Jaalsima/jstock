<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;

    public$brands, $categories, $product, $unique_input_identifier;
    public  $brand_id, $category_id, $name, $description, $quantity, $measurement_unit, $purchase_price, $selling_price, $slug, $status, $expiration, $observations,  $image;
    public $open =false;

    protected $rules = [
        'brand_id'          => 'required|exists:brands,id',
        'category_id'       => 'required|exists:categories,id',
        'name'              => 'required|string|max:50',
        'description'       => 'nullable|string|max:500',
        'quantity'          => 'required|integer|min:0',
        'measurement_unit'  => 'required|string',
        'purchase_price'    => 'required|numeric|min:0',
        'selling_price'     => 'required|numeric|min:0',
        'status'            => 'required|in:Disponible,No Disponible',
        'expiration'        => 'nullable|date',
        'observations'      => 'nullable|string',
        'image'             => 'nullable|image|max:2048',
    ];

    public function mount()
    {
        $this->brands = Brand::get(['id', 'name']);
        $this->categories = Category::get(['id', 'name']);
        $this->product = Product::all();
        $this->unique_input_identifier = rand();
    }
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function add(){

        $this->validate();

        $image_url = $this->image->store('products');

        Product::create([
            'brand_id'           => $this->brand_id,
            'category_id'        => $this->category_id,
            $name = 'name'       => $this->name,
            'description'        => $this->description,
            'quantity'           => $this->quantity,
            'measurement_unit'   => $this->measurement_unit,
            'purchase_price'     => $this->purchase_price,
            'selling_price'      => $this->selling_price,
            'slug'               => Str::slug($name),
            'status'             => $this->status,
            'expiration'         => $this->expiration,
            'observations'       => $this->observations,
            'image'              => $image_url,
        ]);

        $this->reset(['open', 'brand_id', 'category_id', 'name', 'description', 'quantity', 'measurement_unit', 'purchase_price', 'selling_price', 'slug', 'status', 'expiration', 'observations','image']);
        $this->unique_input_identifier = rand();
        $this->emitTo('product-table', 'render');
        $this->emit('alert', '¡Producto Creado Exitosamente!');

    }

    public function render()
    {
        return view('livewire.create-product');
    }
}