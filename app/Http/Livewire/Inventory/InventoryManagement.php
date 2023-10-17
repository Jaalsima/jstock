<?php

namespace App\Http\Livewire\Inventory;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;
use App\Models\Product;

class InventoryManagement extends Component
{
    public $search;
    public $categories;
    public $brands;
    public $perPage = 10;
    public $categoryFilter;
    public $brandFilter;
    public $sort = "id";
    public $direction = "desc";
    public $open = false;

    protected $listeners = ['render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedCategoryFilter()
    {
        $this->resetPage();
    }

    public function updatedBrandFilter()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->search = '';
        $this->categoryFilter = '';
        $this->brandFilter = '';
    }

    public function mount()
    {
        $this->categories = Category::all();
        $this->brands = Brand::all();
    }

    public function render()
    {
        $query = Product::query();

        if ($this->search) {
            $query->where('id', 'like', '%' . $this->search . '%')
                ->orWhere('name', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%');
        }

        if ($this->categoryFilter) {
            $query->whereHas('category', function ($q) {
                $q->where('name', $this->categoryFilter);
            });
        }

        if ($this->brandFilter) {
            $query->whereHas('brand', function ($q) {
                $q->where('name', $this->brandFilter);
            });
        }

        $products = $query->orderBy($this->sort, $this->direction)
            ->paginate($this->perPage);

        return view('livewire.inventory.inventory-management', compact('products'));
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
}
