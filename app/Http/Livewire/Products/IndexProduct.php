<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\WithPagination;

class IndexProduct extends Component
{
    use WithPagination;

    public $search;
    public $categories;
    public $brands;
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

    
    // Restablecer propiedades de filtro de búsqueda.
    public function resetFilters()
    {
        $this->search = '';
        $this->categoryFilter = '';
        $this->brandFilter = '';
    }

    public function mount(Category $categoryModel, Brand $brandModel)
    {
        $this->categories = $categoryModel->all();
        $this->brands = $brandModel->all();
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
            ->paginate(10);

        return view('livewire.products.index-product', compact('products'));
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