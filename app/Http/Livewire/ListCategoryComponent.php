<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class ListCategoryComponent extends Component
{
    public function render()
    {
        $categories = Category::orderBy('name','ASC')->get();
        return view('livewire.list-category-component', ['categories'=> $categories])->layout('layouts.app');
    }
}
