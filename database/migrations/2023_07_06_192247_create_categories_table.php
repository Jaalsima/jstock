<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class CategoryManager extends Component
{
    use WithPagination;

    public $name;
    public $description;
    public $slug;
    public $status = 'Activa';
    public $showForm = false;
    public $editMode = false;
    public $categoryId;

    protected $listeners = ['confirmedDelete'];

    public function render()
    {
        $categories = Category::query()
            ->when($this->name, function($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->when($this->status, function($query, $status) {
                return $query->where('status', $status);
            })
            ->orderBy('name')
            ->paginate(10);

        return view('livewire.category-manager', compact('categories'));
    }

    public function showForm($show)
    {
        $this->showForm = $show;
        $this->editMode = false;
        $this->resetFields();
    }

    public function resetFields()
    {
        $this->name = '';
        $this->description = '';
        $this->slug = '';
        $this->status = 'Activa';
    }

    public function saveCategory()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'slug' => 'required',
        ]);

        if ($this->editMode) {
            $category = Category::find($this->categoryId);
            $category->update([
                'name' => $this->name,
                'description' => $this->description,
                'slug' => $this->slug,
                'status' => $this->status,
            ]);
        } else {
            Category::create([
                'name' => $this->name,
                'description' => $this->description,
                'slug' => $this->slug,
                'status' => $this->status,
            ]);
        }

        $this->resetFields();
        $this->showForm(false);
        session()->flash('message', $this->editMode ? 'Categoría actualizada con éxito.' : 'Categoría creada con éxito.');
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->description = $category->description;
        $this->slug = $category->slug;
        $this->status = $category->status;
        $this->editMode = true;
        $this->showForm(true);
    }

    public function deleteCategory($id)
    {
        $this->confirm('¿Estás seguro de que quieres eliminar esta categoría?', [
            'onConfirmed' => 'confirmedDelete',
            'onCancelled' => 'cancelledDelete',
        ]);

        $this->categoryId = $id;
    }

    public function confirmedDelete()
    {
        $category = Category::find($this->categoryId);
        $category->delete();
        session()->flash('message', 'Categoría eliminada con éxito.');
    }

    public function cancelledDelete()
    {
        // Si se cancela la eliminación, no hacemos nada
    }
}
