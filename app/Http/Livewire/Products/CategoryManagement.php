<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryManagement extends Component
{
    use WithPagination;

    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    public $perPage = 10;
    public $status = '';
    public $modalMode = '';
    public $categoryId;

    protected $rules = [
        'category.name' => 'required|min:3',
        'category.description' => 'required|min:3',
        'category.status' => 'nullable|min:3',
        'category.slug' => 'nullable',
    ];

    public $category;

    public function render()
    {
        $categories = Category::withCount('products')
            ->when($this->search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        return view('livewire.products.category-management', compact('categories'));
    }

    public function create()
    {
        $this->category = new Category();
        $this->modalMode = 'create';
    }

    public function store()
    {
        $this->validate([
            'category.name' => 'required|min:3',
            'category.description' => 'required|min:3',
            'category.status' => 'required|min:3',
        ]);

        $this->category->slug = Str::slug($this->category->name);

        $this->category->save();
        $this->modalMode = '';
        $this->reset(['category']);
        $this->render();
    }

    public function show($categoryId)
    {
        $this->category = Category::findOrFail($categoryId);
        $this->modalMode = 'show';
    }

    public function edit($categoryId)
    {
        $this->category = Category::findOrFail($categoryId);
        $this->modalMode = 'edit';
    }

    public function update()
    {
        $this->validate([
            'category.name' => 'required|min:3',
            'category.description' => 'required|min:3',
            'category.status' => 'required|min:3',
            'category.slug' => 'nullable',
        ]);

        $this->category->update();
        $this->modalMode = '';
        $this->reset(['category']);
        $this->render();
    }

    public function delete($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $category->delete();

        $this->render();
    }

    public function closeModal()
    {
        $this->modalMode = '';
    }
}
