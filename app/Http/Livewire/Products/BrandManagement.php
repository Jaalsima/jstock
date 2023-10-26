<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Brand;
use Illuminate\Support\Str;

class BrandManagement extends Component
{
    use WithPagination;

    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    public $perPage = 10;
    public $status = '';
    public $modalMode = '';
    public $brandId;

    protected $rules = [
        'brand.name' => 'required|min:3',
        'brand.description' => 'required|min:3',
        'brand.status' => 'nullable|min:3',
        'brand.slug' => 'nullable',
    ];

    public $brand;

    public function render()
    {
        $brands = Brand::withCount('products')
            ->when($this->search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        return view('livewire.products.brand-management', compact('brands'));
    }

    public function create()
    {
        $this->brand = new Brand();
        $this->modalMode = 'create';
    }

    public function store()
    {
        $this->validate([
            'brand.name' => 'required|min:3',
            'brand.description' => 'required|min:3',
            'brand.status' => 'required|min:3',
        ]);

        $this->brand->slug = Str::slug($this->brand->name);
        $this->brand->save();

        $this->modalMode = '';
        $this->reset(['brand']);
        $this->render();
    }

    public function show($brandId)
    {
        $this->brand = Brand::findOrFail($brandId);
        $this->modalMode = 'show';
    }

    public function edit($brandId)
    {
        $this->brand = Brand::findOrFail($brandId);
        $this->modalMode = 'edit';
    }

    public function update()
    {
        $this->validate([
            'brand.name' => 'required|min:3',
            'brand.description' => 'required|min:3',
            'brand.status' => 'required|min:3',
            'brand.slug' => 'nullable',
        ]);

        $this->brand->update();

        $this->modalMode = '';
        $this->reset(['brand']);
        $this->render();
    }

    public function delete($brandId)
    {
        $brand = Brand::findOrFail($brandId);
        $brand->delete();

        $this->render();
    }

    public function closeModal()
    {
        $this->modalMode = '';
    }
}
