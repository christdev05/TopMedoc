<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class AdminCategoriesComponent extends Component
{

    use WithPagination, WithFileUploads;

    protected $paginationTheme = "bootstrap";

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('message', 'Category has been deleted successfully');
    }
    
    public function render()
    {
        $categories = Category::paginate(5);
        return view('livewire.admin.admin-categories-component',['categories'=>$categories])->layout('layouts.app');
    }
}
