<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class AdminProductComponent extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = "bootstrap";

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        session()->flash('message', 'Category has been deleted successfully');
    }
    
    public function render()
    {
        $products = Product::paginate(10);
        return view('livewire.admin.admin-product-component',['products'=>$products])->layout('layouts.app');
    }
}
