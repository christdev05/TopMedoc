<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\HomeSlider;

class HomeComponent extends Component
{
    public function render()
    {
        $sliders = HomeSlider::where('status',1)->get();
        $lproducts = Product::orderBy('created_at','DESC')->get()->take(8);
        $categories = Category::orderBy('name','ASC')->get();
        $nproducts = Product::latest()->take(8)->get();
        $products = Product::orderBy('created_at','ASC')->get()->take(8);
        return view('livewire.home-component',['sliders'=>$sliders,'lproducts'=>$lproducts,'categories'=>$categories,'nproducts'=>$nproducts, 'products'=>$products])->layout('layouts.app');
    }
}
