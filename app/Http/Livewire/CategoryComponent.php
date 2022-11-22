<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;

class CategoryComponent extends Component
{
    use WithPagination;

    public $pageSize = 12;

    public $orderBy = "Default Sorting";

    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        Session()->flash('success_message', 'Item added in cart');
        return redirect()->route('shop.cart');
    }

    public function changePageSize($size)
    {
       $this->pageSize = $size; 
    }

    public function changeOrderBy($order)
    {
        $this->orderBy = $order;
    }

    public function addToWishlist($product_id,$product_name,$product_price){
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-icon-component','refreshComponent');
    }

    public function removefromWishlist($product_id)
    {
        foreach (Cart::instance('wishlist')->content() as $witem)
        {
            if ($witem->id == $product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-icon-component','refreshComponent');
                return;
            }
        }
    }
    
    public function render()
    {
        $category = Category::where('slug',$this->slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;
        if ($this->orderBy == 'Price: Low to High') {
            $products = Product::where('category_id', $category_id)->orderBy('regular_price','ASC')->Paginate($this->pageSize);
        }
        elseif($this->orderBy == 'Price: High to Low'){
            $products = Product::where('category_id', $category_id)->orderBy('regular_price','DESC')->Paginate($this->pageSize);
        }
        elseif($this->orderBy == 'Sort By Newness'){
            $products = Product::where('category_id', $category_id)->orderBy('created_at','DESC')->Paginate($this->pageSize);

        }
        else{
            $products = Product::where('category_id', $category_id)->Paginate($this->pageSize);
        }

        $categories = Category::orderBy('name','ASC')->get();
        $nproducts = Product::latest()->take(4)->get();
        return view('livewire.category-component',['products'=>$products,'nproducts'=>$nproducts,'categories'=> $categories, 'category_name'=>$category_name])->layout('layouts.app');
    }
}
