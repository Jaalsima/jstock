<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Supplier;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;

    public $brands, $categories, $suppliers, $product, $unique_input_identifier;
    public  $brand_id, $category_id, $supplier_id, $name, $description, $current_stock, $min_stock, $max_stock, $measurement_unit, $purchase_price, $selling_price, $slug, $status, $expiration, $observations,  $image;
    public $open = false;

    protected $rules = [
        'brand_id'          => 'required|exists:brands,id',
        'category_id'       => 'required|exists:categories,id',
        'supplier_id'       => 'required|exists:suppliers,id',
        'name'              => 'required|max:50',
        'description'       => 'nullable|string',
        'current_stock'     => 'required|integer|min:0',
        'min_stock'         => 'nullable|integer|min:1',
        'max_stock'         => 'nullable|integer|min:2',
        'measurement_unit'  => 'nullable|string',
        'purchase_price'    => 'required|numeric|min:0',
        'selling_price'     => 'required|numeric|min:0',
        'status'            => 'required|in:Disponible,No Disponible,Agotado,Expirable,Vencido',
        'expiration'        => 'nullable|date|after_or_equal:today',
        'observations'      => 'nullable|string',
        'image'             => 'nullable|image|max:2048',
    ];

    public function mount()
    {
        $this->brands = Brand::get(['id', 'name']);
        $this->categories = Category::get(['id', 'name']);
        $this->suppliers = Supplier::get(['id', 'name']);
        $this->product = Product::get();
        $this->unique_input_identifier = rand();
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {

        $this->validate();

        $image_url = $this->image->store('products');


        Product::create([
            'brand_id'           => $this->brand_id,
            'category_id'        => $this->category_id,
            'supplier_id'        => $this->supplier_id,
            $name = 'name'       => $this->name,
            'description'        => $this->description,
            'current_stock'      => $this->current_stock,
            'min_stock'          => $this->min_stock,
            'max_stock'          => $this->max_stock,
            'measurement_unit'   => $this->measurement_unit,
            'purchase_price'     => $this->purchase_price,
            'selling_price'      => $this->selling_price,
            'slug'               => Str::slug($name),
            'status'             => $this->status,
            'expiration'         => $this->expiration,
            'observations'       => $this->observations,
            'image'              => $image_url,
        ]);

        $this->reset(['open', 'brand_id', 'category_id', 'supplier_id', 'name', 'description', 'current_stock', 'min_stock', 'max_stock', 'measurement_unit', 'purchase_price', 'selling_price', 'slug', 'status', 'expiration', 'observations', 'image']);
        $this->unique_input_identifier = rand();
        $this->emitTo('products.index-product', 'render');
        $this->emitTo('inventory.inventory-management', 'render');
        $this->emit('alert', '¡Producto Creado Exitosamente!');
    }

    public function render()
    {
        return view('livewire.products.create-product');
    }
}
