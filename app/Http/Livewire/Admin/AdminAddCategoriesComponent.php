<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class AdminAddCategoriesComponent extends Component
{
    public $name;
    public $slug;

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required|unique:categories'
        ]);
    }

    public function storeCategory()
    {
        $this->validate([
            'name'=>'required',
            'slug'=>'required|unique:categories'
        ]);
        $categories = new Category();
        $categories->name = $this->name;
        $categories->slug = $this->slug;
        $categories->save();
        session()->flash('message', 'Category has been created successfuly!');
    }
    
    public function render()
    {
        return view('livewire.admin.admin-add-categories-component')->layout('layouts.app');
    }
}
